<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-16
 * Time: 11:04
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Maestro;
use Exception;
use Illuminate\Http\Request;
use Validator;

class MaestroController extends Controller
{
    public function index(Request $request)
    {
        $query = Maestro::query()
            ->orderBy('nombre_completo');

        $validator = Validator::make($request->all(), [
            'paginate' => 'present',
        ]);

        if ($validator->fails()) {
            $items = $query->get();
        } else {
            $items = $query->paginate(50);
        }

        return [
            'items' => $items,
        ];
    }

    public function store(Request $request)
    {
        $item = new Maestro($request->input());

        $item->save();

        return ok([ 'item' => $item ]);
    }

    public function update(Request $request, Maestro $maestro)
    {
        $maestro->update($request->input());

        return ok([ 'item' => $maestro ]);
    }

    public function delete(Maestro $maestro)
    {
        try {
            $maestro->delete();

            return ok();
        } catch (Exception $e) {
            return unprocessable_entity([
                'trace'   => $e->getTraceAsString(),
                'message' => $e->getMessage(),
            ], 'Error');
        }
    }
}
