<?php

namespace DivisionEstudios\Http\Controllers;

use Auth;
use DivisionEstudios\Models\Opcion;

class AppController extends Controller
{
    public function index()
    {
        $user     = Auth::user();
        $roles    = $user->getRoleNames();
        $apiToken = $user->api_token;

        $opciones = Opcion::query()
            ->with('modulos')
            ->orderBy('descripcion')
            ->get();

        return view('home', [
            'user'     => [
                'name'  => $user->name,
                'email' => $user->email,
            ],
            'roles'    => $roles,
            'apiToken' => $apiToken,
            'opciones' => $opciones,
        ]);
    }
}
