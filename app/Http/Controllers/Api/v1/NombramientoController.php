<?php

namespace DivisionEstudios\Http\Controllers\Api\v1;

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
        $query = Nombramiento::with('sinodales', 'sinodales.maestro', 'memo', 'alumno', 'alumno.carrera', 'opcion', 'modulo', 'horario', 'archivos');

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
}
