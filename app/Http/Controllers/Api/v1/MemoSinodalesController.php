<?php

namespace DivisionEstudios\Http\Controllers\Api\v1;


use Carbon\Carbon;
use DB;
use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Archivo;
use DivisionEstudios\Models\Documento;
use DivisionEstudios\Models\Nombramiento;
use Jenssegers\Date\Date;
use PhpOffice\PhpWord\TemplateProcessor;

class MemoSinodalesController extends Controller
{
    public function store(Nombramiento $nombramiento)
    {
        Date::setLocale('es');
        $fecha = new Date($nombramiento->fecha);
        $hora  = new Date($nombramiento->horario->hora);

        $nombramiento->load('alumno.carrera', 'alumno.carrera.jefeDepartamento', 'alumno.carrera.jefeDepartamento.responsable', 'alumno', 'horario', 'opcion', 'modulo', 'memo');

        $opcion  = $nombramiento->opcion;
        $modulo  = $nombramiento->modulo;
        $jefatzo = $nombramiento->alumno->carrera->jefeDepartamento;

        try {
            $templateProcessor = new TemplateProcessor(storage_path('app/machotes/machote_memos_sinodales.docx'));

            $archivo = DB::transaction(function () use ($nombramiento, $opcion, $modulo, $jefatzo, $hora, $fecha, $templateProcessor) {

                if ($nombramiento->estatus == 'P') {
                    $nombramiento->update([ 'estatus' => 'E' ]);
                }

                $templateProcessor->setValue('jefeDepartamento', $jefatzo->responsable->name);
                $templateProcessor->setValue('departamento', $jefatzo->jefatura);
                $templateProcessor->setValue('alumnoNombreCompleto', $nombramiento->alumno->nombre_completo);
                $templateProcessor->setValue('carrera', $nombramiento->alumno->carrera->descripcion);
                $templateProcessor->setValue('opcion', $opcion->descripcion);
                $templateProcessor->setValue('modulo', optional($modulo)->descripcion);
                $templateProcessor->setValue('horario', $hora->format('H:i'));
                $templateProcessor->setValue('oficio', $nombramiento->memo->numero_oficio);
                $templateProcessor->setValue('fecha_ofi', Carbon::now()->format('d/m/Y'));
                $templateProcessor->setValue('fecha_prog', strtoupper($fecha->format('l j F \\d\\e Y')));

                if ( ! \File::exists(storage_path('app/public/nombramientos/') . $nombramiento->id)) {
                    \File::makeDirectory(storage_path('app/public/nombramientos/') . $nombramiento->id);
                }

                $templateProcessor->saveAs(storage_path('app/public/nombramientos/') . $nombramiento->id . '/memo_sinodales.docx');

                $documento = Documento::query()->where('descripcion', 'MEMO SINODALES')->value('descripcion');

                $archivo = new Archivo([
                    'documento'      => $documento,
                    'file_name'      => 'memo_sinodales',
                    'file_path'      => "app/public/nombramientos/{$nombramiento->id}/memo_sinodales.docx",
                    'file_extension' => 'docx',
                    'disk'           => '',
                ]);

                $nombramiento->archivos()->save($archivo);

                return $archivo;
            });

            return ok([ 'archivo' => $archivo ]);
        } catch (\Exception $e) {
            \Log::info($e->getTraceAsString());
            \Log::info($e->getMessage());

            return unprocessable_entity([], $e->getMessage());
        } catch (\Throwable $e) {
            return unprocessable_entity([], $e->getMessage());
        }
    }
}
