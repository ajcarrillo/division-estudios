<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
            'jefe-departamento',
            'titulacion',
            'convalidacion',
            'division-estudios',
            'servicios-escolares',
            'subdireccion-academica',
        ];

        foreach ($roles as $role) {
            Role::create([ 'name' => $role ]);
        }
    }
}
