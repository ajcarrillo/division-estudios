<?php

namespace DivisionEstudios\Http\Controllers\Api\v1;

use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Archivo;
use DivisionEstudios\Models\Nombramiento;
use Illuminate\Database\QueryException;
use Jenssegers\Date\Date;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;

class JuramentoController extends Controller
{
    public function download(Nombramiento $nombramiento)
    {
        return response()->download(storage_path('app/public/nombramientos/') . $nombramiento->id . '/juramento.docx');
    }

    public function store(Nombramiento $nombramiento)
    {
        Date::setLocale('es');
        $nombramiento->load('alumno.carrera', 'alumno', 'horario');

        $fecha = new Date($nombramiento->fecha);
        $hora  = new Date($nombramiento->horario->hora);

        try {
            $templateProcessor = new TemplateProcessor(storage_path('app/machotes/machote_juramento.docx'));
            $templateProcessor->setValue('dia', strtoupper($fecha->format('j')));
            $templateProcessor->setValue('mes', strtoupper($fecha->format('F')));
            $templateProcessor->setValue('year', $fecha->format('Y'));
            $templateProcessor->setValue('titulo', $nombramiento->alumno->carrera->grado);
            $templateProcessor->setValue('alumno', $nombramiento->alumno->nombre_completo);

            $archivo = new Archivo([
                'documento'      => 'JURAMENTO',
                'file_name'      => 'juramento',
                'file_path'      => "app/public/nombramientos/{$nombramiento->id}/juramento.docx",
                'file_extension' => 'docx',
                'disk'           => '',
            ]);

            $nombramiento->archivos()->save($archivo);

            if ( ! \File::exists(storage_path('app/public/nombramientos/') . $nombramiento->id)) {
                \File::makeDirectory(storage_path('app/public/nombramientos/') . $nombramiento->id);
            }

            $templateProcessor->saveAs(storage_path('app/public/nombramientos/') . $nombramiento->id . '/juramento.docx');

            return ok([ 'archivo' => $archivo ]);
        } catch (QueryException $e) {
            return unprocessable_entity([], $e->getMessage());
        } catch (CopyFileException $e) {
            return unprocessable_entity([], $e->getMessage());
        } catch (CreateTemporaryFileException $e) {
            return unprocessable_entity([], $e->getMessage());
        }
    }
}
