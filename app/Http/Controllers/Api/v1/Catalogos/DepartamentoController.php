<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-21
 * Time: 12:15
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\JefeDepartamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $items = JefeDepartamento::query()
            ->with('responsable')
            ->orderBy('jefatura')
            ->get();

        return ok([ 'items' => $items ]);
    }

    public function store(Request $request)
    {
        $item = new JefeDepartamento($request->input());

        $item->save();

        $item->load('responsable');

        return [ 'item' => $item ];
    }

    public function update(Request $request, JefeDepartamento $departamento)
    {
        $departamento->update($request->input());

        $departamento->load('responsable');

        return [ 'item' => $departamento ];
    }

    public function delete(JefeDepartamento $departamento)
    {
        try {
            $departamento->delete();

            return ok();
        } catch (\Exception $e) {
            return unprocessable_entity([
                'trace'   => $e->getTraceAsString(),
                'message' => $e->getMessage(),
            ], 'Error');
        }
    }
}
