<?php

namespace DivisionEstudios\Http\Controllers;

use Auth;

class AppController extends Controller
{
    public function index()
    {
        $user     = Auth::user();
        $roles    = $user->getRoleNames();
        $apiToken = $user->api_token;

        return view('home', [
            'user'     => [
                'name'  => $user->name,
                'email' => $user->email,
            ],
            'roles'    => $roles,
            'apiToken' => $apiToken,
        ]);
    }
}
