<?php

namespace DivisionEstudios\Http\Controllers\Api\v1;

use DB;
use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Carrera;
use DivisionEstudios\Models\Horario;
use DivisionEstudios\Models\Nombramiento;
use DivisionEstudios\Models\NumeroOficio;
use DivisionEstudios\Models\Opcion;
use Illuminate\Http\Request;

class NombramientoController extends Controller
{

    protected $result = [
        'is_valid' => false,
        'errors'   => NULL,
        'msg'      => NULL,
    ];

    public function getData()
    {
        $carreras = Carrera::selectRaw('id as value, descripcion as text')->orderBy('descripcion')->get();
        $opciones = Opcion::selectRaw('id as value, concat_ws(" ",clave,descripcion) as text')->orderBy('clave')->get();
        $horas    = Horario::selectRaw('id as value, hora as text')->orderBy('hora')->get();

        return response()->json(compact('carreras', 'opciones', 'horas'));
    }

    public function index(Request $request)
    {
        $query = Nombramiento::with('sinodales', 'sinodales.maestro', 'memo', 'alumno', 'alumno.carrera', 'opcion', 'modulo', 'horario');

        if (get_current_api_user()->hasRole('division-estudios')) {

            $nombramientos = $query->paginate(50);
        } elseif (get_current_api_user()->hasRole('jefe-departamento')) {

            $nombramientos = $query->whereHas('alumno', function ($alumno) {
                $alumno->whereIn('carrera_id', get_current_api_user()->departamento->carreras()->pluck('id'));
            })->whereIn('estatus', [ 'E', 'C' ])->paginate(50);
        }

        return ok(compact('nombramientos'));
    }

    public function store(Request $request)
    {
        $data   = $request->post('nombramiento');
        $oficio = NumeroOficio::getNumeroOficio();
        $oficio->update([ 'activo' => 0 ]);

        $nombramiento                 = new Nombramiento($data);
        $nombramiento->estatus        = 'P';
        $nombramiento->numero_memo_id = $oficio->id;
        $nombramiento->save();

        return ok(compact('nombramiento'));
    }

    public function storeSinodales(Request $request, Nombramiento $nombramiento)
    {
        try {
            DB::transaction(function () use ($request, $nombramiento) {
                $presi         = $request->post('presidente');
                $secretario    = $request->post('secretario');
                $vocal         = $request->post('vocal');
                $vocalSuplente = $request->post('vocalSuplente');

                if ( ! is_null($presi)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'PRESIDENTE' ], [ 'maestro_id' => $presi['value'] ]
                    );
                }

                if ( ! is_null($secretario)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'SECRETARIO' ], [ 'maestro_id' => $secretario['value'] ]
                    );
                }

                if ( ! is_null($vocal)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'VOCAL' ], [ 'maestro_id' => $vocal['value'] ]
                    );
                }

                if ( ! is_null($vocalSuplente)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'VOCAL SUPLENTE' ], [ 'maestro_id' => $vocalSuplente['value'] ]
                    );
                }
            });
            $this->result['is_valid'] = true;
        } catch (\Exception $e) {
            $this->result['msg']    = $e->getMessage();
            $this->result['errors'] = $e->getTraceAsString();
        } catch (\Throwable $e) {
            $this->result['msg']    = $e->getMessage();
            $this->result['errors'] = $e->getTraceAsString();
        }

        return response()->json($this->result);
    }
}
