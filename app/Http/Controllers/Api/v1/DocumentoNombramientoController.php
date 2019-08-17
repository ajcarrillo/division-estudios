<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-16
 * Time: 21:47
 */

namespace DivisionEstudios\Http\Controllers\Api\v1;


use Carbon\Carbon;
use DB;
use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Archivo;
use DivisionEstudios\Models\Documento;
use DivisionEstudios\Models\Nombramiento;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use PhpOffice\PhpWord\TemplateProcessor;

class DocumentoNombramientoController extends Controller
{
    public function download(Nombramiento $nombramiento)
    {
        return response()->download(storage_path('app/public/nombramientos/') . $nombramiento->id . '/nombramiento.docx');
    }

    public function store(Request $request, Nombramiento $nombramiento)
    {
        Date::setLocale('es');
        $fecha = new Date($nombramiento->fecha);
        $hora  = new Date($nombramiento->horario->hora);

        $nombramiento->load('alumno', 'alumno.carrera', 'alumno.carrera.jefeDepartamento', 'alumno.carrera.jefeDepartamento.responsable', 'horario', 'sinodales', 'sinodales.maestro', 'opcion', 'modulo');

        $opcion = $nombramiento->opcion;
        $modulo = $nombramiento->modulo;

        try {
            $templateProcessor = new TemplateProcessor(storage_path('app/machotes/machote_nombramiento.docx'));

            $archivo = DB::transaction(function () use ($nombramiento, $opcion, $modulo, $hora, $fecha, $templateProcessor, $request) {

                $nombramiento->numero_oficio = $request->input('numero_oficio');
                $nombramiento->estatus       = 'C';
                $nombramiento->save();

                $presi    = $nombramiento->sinodales()->where('tipo', 'PRESIDENTE')->first();
                $secre    = $nombramiento->sinodales()->where('tipo', 'SECRETARIO')->first();
                $vocal    = $nombramiento->sinodales()->where('tipo', 'VOCAL')->first();
                $vocalSup = $nombramiento->sinodales()->where('tipo', 'VOCAL SUPLENTE')->first();

                $templateProcessor->setValue('num_oficio', $nombramiento->numero_oficio);
                $templateProcessor->setValue('fecha', Carbon::now()->format('d/m/Y'));
                $templateProcessor->setValue('presi_nombre', $presi->maestro->especialidad . ' ' . $presi->maestro->nombre_completo);
                $templateProcessor->setValue('presi_cedula', $presi->maestro->cedula_profesional);
                $templateProcessor->setValue('secre_nombre', $secre->maestro->especialidad . ' ' . $secre->maestro->nombre_completo);
                $templateProcessor->setValue('secre_cedula', $secre->maestro->cedula_profesional);
                $templateProcessor->setValue('vocal_nombre', $vocal->maestro->especialidad . ' ' . $vocal->maestro->nombre_completo);
                $templateProcessor->setValue('vocal_cedula', $vocal->maestro->cedula_profesional);
                $templateProcessor->setValue('vocal_sup_nombre', $vocalSup->maestro->especialidad . ' ' . $vocalSup->maestro->nombre_completo);
                $templateProcessor->setValue('vocal_sup_cedula', $vocalSup->maestro->cedula_profesional);
                $templateProcessor->setValue('opcion', $opcion->descripcion);
                $templateProcessor->setValue('modulo', optional($modulo)->descripcion);
                $templateProcessor->setValue('proyecto', $nombramiento->proyecto);
                $templateProcessor->setValue('alumno', $nombramiento->alumno->nombre_completo);
                $templateProcessor->setValue('num_control', $nombramiento->alumno->numero_control);
                $templateProcessor->setValue('carrera', $nombramiento->alumno->carrera->descripcion);
                $templateProcessor->setValue('fecha_prog', strtoupper($fecha->format('l j F \\d\\e Y')));
                $templateProcessor->setValue('horario', $hora->format('H:i'));
                $templateProcessor->setValue('jefe_depto', $nombramiento->alumno->carrera->jefeDepartamento->responsable->name);
                $templateProcessor->setValue('jefatura', $nombramiento->alumno->carrera->jefeDepartamento->jefatura);

                if ( ! \File::exists(storage_path('app/public/nombramientos/') . $nombramiento->id)) {
                    \File::makeDirectory(storage_path('app/public/nombramientos/') . $nombramiento->id);
                }

                $templateProcessor->saveAs(storage_path('app/public/nombramientos/') . $nombramiento->id . '/nombramiento.docx');

                $documento = Documento::query()->where('descripcion', 'NOMBRAMIENTO')->value('descripcion');

                $archivo = new Archivo([
                    'documento'      => $documento,
                    'file_name'      => 'nombramiento',
                    'file_path'      => "app/public/nombramientos/{$nombramiento->id}/nombramiento.docx",
                    'file_extension' => 'docx',
                    'disk'           => '',
                ]);

                $nombramiento->archivos()->save($archivo);

                return $archivo;
            });

            return ok([ 'archivo' => $archivo ]);
        } catch (\Exception $e) {
            return unprocessable_entity([], $e->getMessage());
        } catch (\Throwable $e) {
            return unprocessable_entity([], $e->getMessage());
        }
    }
}
