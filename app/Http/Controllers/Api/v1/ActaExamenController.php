<?php

namespace DivisionEstudios\Http\Controllers\Api\v1;

use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Archivo;
use DivisionEstudios\Models\Documento;
use DivisionEstudios\Models\Nombramiento;
use Jenssegers\Date\Date;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;

class ActaExamenController extends Controller
{
    public function download(Nombramiento $nombramiento)
    {
        return response()->download(storage_path('app/public/nombramientos/') . $nombramiento->id . '/acta.docx');
    }

    public function store(Nombramiento $nombramiento)
    {
        Date::setLocale('es');
        $nombramiento->load('alumno.carrera', 'alumno');

        $fecha = new Date($nombramiento->fecha);
        $secre = $nombramiento->sinodales()->where('tipo', 'SECRETARIO')->first();

        $secretario = $secre->maestro->especialidad . ' ' . $secre->maestro->nombre_completo;
        $cedula     = $secre->maestro->cedula_profesional;

        try {
            $templateProcessor = new TemplateProcessor(storage_path('app/machotes/machote_acta_examen.docx'));
            $templateProcessor->setValue('dia', strtoupper($fecha->format('j')));
            $templateProcessor->setValue('mes', strtoupper($fecha->format('F')) . ' de ' . $fecha->format('Y'));

            $templateProcessor->setValue('alumno', strtoupper($nombramiento->alumno->nombre_completo));
            $templateProcessor->setValue('carrera', strtoupper($nombramiento->alumno->carrera->descripcion));
            $templateProcessor->setValue('secretario', strtoupper($secretario));
            $templateProcessor->setValue('cedula', strtoupper($cedula));

            $documento = Documento::query()->where('descripcion', 'ACTA')->value('descripcion');

            $archivo = new Archivo([
                'documento'      => $documento,
                'file_name'      => 'acta',
                'file_path'      => "app/public/nombramientos/{$nombramiento->id}/acta.docx",
                'file_extension' => 'docx',
                'disk'           => '',
            ]);

            $nombramiento->archivos()->save($archivo);

            if ( ! \File::exists(storage_path('app/public/nombramientos/') . $nombramiento->id)) {
                \File::makeDirectory(storage_path('app/public/nombramientos/') . $nombramiento->id);
            }

            $templateProcessor->saveAs(storage_path('app/public/nombramientos/') . $nombramiento->id . '/acta.docx');

            return ok([ 'archivo' => $archivo ]);
        } catch (CopyFileException $e) {
            return unprocessable_entity([], $e->getMessage());
        } catch (CreateTemporaryFileException $e) {
            return unprocessable_entity([], $e->getMessage());
        }
    }
}
