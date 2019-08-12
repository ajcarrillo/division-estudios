<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'jefe_depto',
            'titulacion',
            'division',
            'servicios_escolares',
        ];

        foreach ($roles as $role) {
            \Titulaciones\Role::create([
                'descripcion' => $role,
            ]);
        }
    }
}
