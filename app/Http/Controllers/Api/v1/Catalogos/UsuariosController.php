<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-21
 * Time: 13:33
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        $items = User::query()
            ->orderBy('name')
            ->get();

        return [ 'items' => $items ];
    }
}
