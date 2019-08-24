<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-24
 * Time: 15:36
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->password = Hash::make($request->input('password'));

        $user->setRememberToken(Str::random(60));

        $user->save();

        return ok();
    }
}
