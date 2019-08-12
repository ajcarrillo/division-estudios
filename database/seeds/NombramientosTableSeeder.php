<?php

use Illuminate\Database\Seeder;

class NombramientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumnos = \DivisionEstudios\Models\Alumno::take(100)
            ->inRandomOrder()
            ->get();

        $date = \Carbon\Carbon::now();
        foreach ($alumnos as $alumno) {
            \DivisionEstudios\Models\Nombramiento::create([
                'numero_memo_id' => 1,
                'numero_oficio'  => '9999',
                'alumno_id'      => $alumno->id,
                'opcion_id'      => \DivisionEstudios\Models\Opcion::inRandomOrder()->first()->id,
                'modulo_id'      => \DivisionEstudios\Models\Modulo::inRandomOrder()->first()->id,
                'proyecto'       => NULL,
                'fecha'          => $date,
                'horario_id'     => \DivisionEstudios\Models\Horario::inRandomOrder()->first()->id,
                'estatus'        => 'C',
            ]);
            $date = $date->addDay(1);
        }
    }
}
