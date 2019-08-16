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

class MaestroController extends Controller
{
    public function index()
    {
        $items = Maestro::query()
            ->orderBy('nombre_completo')
            ->select('id', 'nombre_completo')
            ->get();

        return [
            'items' => $items,
        ];
    }
}
