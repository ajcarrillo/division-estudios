<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-21
 * Time: 13:33
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DB;
use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        $items = User::query()
            ->with('roles:id,name')
            ->orderBy('name')
            ->get();

        return [ 'items' => $items ];
    }

    public function store(Request $request)
    {


        try {
            $item = DB::transaction(function () use ($request) {
                $item = User::create([
                    'name'      => $request->input('name'),
                    'email'     => $request->input('email'),
                    'api_token' => Str::random(60),
                    'password'  => Hash::make($request->input('password')),
                    'active'    => 1,
                ]);

                $item->syncRoles($request->input('roles'));

                return $item;
            });

            return ok([ 'item' => $item ]);
        } catch (\Exception $e) {
            return unprocessable_entity([
                'trace'   => $e->getTraceAsString(),
                'message' => $e->getMessage(),
            ], $e->getMessage());
        }
    }

    public function update(Request $request, User $user)
    {
        $data = $request->except([ 'password' ]);

        try {
            $user = DB::transaction(function () use ($request, $data, $user) {
                $user->update($data);

                $user->syncRoles($request->input('roles'));

                $user->load('roles');

                return $user;
            });

            return ok([ 'item' => $user ]);
        } catch (\Exception $e) {
            return unprocessable_entity([
                'trace'   => $e->getTraceAsString(),
                'message' => $e->getMessage(),
            ], $e->getMessage());
        }
    }
}
