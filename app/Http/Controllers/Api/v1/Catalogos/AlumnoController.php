<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-18
 * Time: 14:36
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Alumno;
use DivisionEstudios\Models\Filters\AlumnoFilters;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(Request $request, AlumnoFilters $filters)
    {
        $params = $request->only([ 'numero_control', 'sinNombramiento' ]);

        $alumno = Alumno::query()
            ->with('carrera')
            ->filterBy($filters, $params)
            ->first();

        return [ 'alumno' => $alumno ];
    }
}
