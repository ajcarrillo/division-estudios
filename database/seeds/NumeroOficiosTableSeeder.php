<?php

use Illuminate\Database\Seeder;

class NumeroOficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 500; $i <= 1000; $i++) {
            DB::table('numero_oficios')
                ->insert([
                    'numero_oficio' => $i,
                    'activo'        => true,
                    'year'          => 2019,
                ]);
        }
    }
}
