<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 8/24/19
 * Time: 8:42 p. m.
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Alumno;
use DivisionEstudios\Models\Filters\AlumnoFilters;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index(Request $request, AlumnoFilters $filters)
    {
        $params = $request->only([ 'numero_control', 'sinNombramiento' ]);

        $items = Alumno::query()
            ->with('carrera')
            ->filterBy($filters, $params)
            ->paginate(50);

        return [ 'items' => $items ];
    }

    public function store(Request $request)
    {
        $item = new Alumno($request->input());

        $item->save();

        $item->load('carrera');

        return ok([ 'item' => $item ]);
    }

    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->input());

        $alumno->load('carrera');

        return ok([ 'item' => $alumno ]);
    }
}
