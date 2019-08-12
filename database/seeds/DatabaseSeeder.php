<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OpcionModuloTableSeeder::class);
        $this->call(JefeDepartamentoTableSeeder::class);
        $this->call(CarreraTableSeeder::class);
        $this->call(HorariosTableSeeder::class);
        $this->call(MaestroTableSeeder::class);
        $this->call(NumeroOficiosTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(GeneracionTableSeeder::class);
        $this->call(AlumnoTableSeeder::class);
    }
}
