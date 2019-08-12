<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = \Titulaciones\Role::whereIn('id', [ 2, 3 ])->pluck('id');
        $users = \Titulaciones\User::whereIn('email', [ 'profesionales@itchetumal.edu.mx' ])->get();

        foreach ($users as $user) {
            $user->roles()->sync($roles);
        }
    }
}
