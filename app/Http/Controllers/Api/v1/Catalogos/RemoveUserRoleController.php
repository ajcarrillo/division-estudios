<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-24
 * Time: 13:25
 */

namespace DivisionEstudios\Http\Controllers\Api\v1\Catalogos;


use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\User;
use Illuminate\Http\Request;

class RemoveUserRoleController extends Controller
{
    public function delete(Request $request, User $user)
    {
        $role = $request->input('role');

        $user->removeRole($role);

        return ok();
    }
}
