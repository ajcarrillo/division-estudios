<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-18
 * Time: 17:28
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DB;
use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Filters\HorarioFilters;
use DivisionEstudios\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index(Request $request, HorarioFilters $filters)
    {
        $params = $request->only([ 'fecha' ]);

        $items = Horario::query()
            ->filterBy($filters, $params)
            ->select(DB::raw('TIME_FORMAT(hora, "%H:%i") as hora'), 'id')
            ->get();

        return ok([ 'items' => $items ]);
    }
}
