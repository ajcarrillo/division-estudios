<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-22
 * Time: 13:32
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        $items = Carrera::query()
            ->with('jefeDepartamento', 'jefeDepartamento.responsable')
            ->orderBy('descripcion')
            ->get();

        return [ 'items' => $items ];
    }

    public function store(Request $request)
    {
        $item = new Carrera($request->input());

        $item->save();

        $item->load('jefeDepartamento', 'jefeDepartamento.responsable');

        return [ 'item' => $item ];
    }

    public function update(Request $request, Carrera $carrera)
    {
        $carrera->update($request->input());

        $carrera->load('jefeDepartamento', 'jefeDepartamento.responsable');

        return [ 'item' => $carrera ];
    }

    public function delete(Carrera $carrera)
    {
        try {
            $carrera->delete();

            return ok();
        } catch (\Exception $e) {
            return unprocessable_entity([
                'trace'   => $e->getTraceAsString(),
                'message' => $e->getMessage(),
            ], $e->getMessage());
        }
    }
}
