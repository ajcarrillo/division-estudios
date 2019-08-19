<?php

namespace DivisionEstudios\Http\Controllers\Api\v1;

use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Nombramiento;
use DivisionEstudios\Models\NumeroOficio;
use Illuminate\Http\Request;

class NombramientoController extends Controller
{
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
        $oficio = NumeroOficio::getNumeroOficio();
        $oficio->update([ 'activo' => 0 ]);

        $nombramiento                 = new Nombramiento($request->input());
        $nombramiento->estatus        = 'P';
        $nombramiento->numero_memo_id = $oficio->id;
        $nombramiento->save();

        return ok(compact('nombramiento'));
    }
}
