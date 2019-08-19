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
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('numero_control');

        $alumno = Alumno::query()
            ->with('carrera')
            ->where('numero_control', $id)
            ->first();

        return [ 'alumno' => $alumno ];
    }
}
