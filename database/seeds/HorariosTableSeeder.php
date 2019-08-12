<?php

use Illuminate\Database\Seeder;

class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horaInicio = Carbon\Carbon::createFromTime(7, 30);
        while ($horaInicio < \Carbon\Carbon::createFromTime(14, 0)) {
            DB::table('horarios')
                ->insert([
                    'hora' => $horaInicio->addMinutes(30),
                    'tipo' => 'MEDIA HORA',
                ]);
        }

        $horaInicioTarde = Carbon\Carbon::createFromTime(16, 30);
        while ($horaInicioTarde < \Carbon\Carbon::createFromTime(21, 30)) {
            DB::table('horarios')
                ->insert([
                    'hora' => $horaInicioTarde->addMinutes(30),
                    'tipo' => 'MEDIA HORA',
                ]);
        }/*


        $horaInicio = Carbon\Carbon::createFromTime(7, 0);
        while ($horaInicio < \Carbon\Carbon::createFromTime(14, 0)) {
            DB::table('horarios')
                ->insert([
                    'hora' => $horaInicio->addMinutes(60),
                    'tipo' => 'HORA',
                ]);
        }

        $horaInicioTarde = Carbon\Carbon::createFromTime(16, 0);
        while ($horaInicioTarde < \Carbon\Carbon::createFromTime(21, 0)) {
            DB::table('horarios')
                ->insert([
                    'hora' => $horaInicioTarde->addMinutes(60),
                    'tipo' => 'HORA',
                ]);
        }*/
    }
}
