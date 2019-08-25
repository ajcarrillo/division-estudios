<?php

use Carbon\Carbon;
use DivisionEstudios\Models\Alumno;
use DivisionEstudios\Models\Horario;
use DivisionEstudios\Models\Modulo;
use DivisionEstudios\Models\Nombramiento;
use DivisionEstudios\Models\NumeroOficio;
use DivisionEstudios\Models\Opcion;
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
        $alumnos = Alumno::take(100)
            ->inRandomOrder()
            ->get();

        $date = Carbon::now();

        foreach ($alumnos as $alumno) {

            $oficio = NumeroOficio::getNumeroOficio();
            $oficio->update([ 'activo' => 0 ]);

            Nombramiento::create([
                'numero_memo_id' => $oficio->id,
                'numero_oficio'  => NULL,
                'alumno_id'      => $alumno->id,
                'opcion_id'      => Opcion::inRandomOrder()->first()->id,
                'modulo_id'      => Modulo::inRandomOrder()->first()->id,
                'proyecto'       => NULL,
                'fecha'          => $date,
                'horario_id'     => Horario::inRandomOrder()->first()->id,
                'estatus'        => 'C',
            ]);
            $date = $date->addDay(rand(1, 5));
        }
    }
}
