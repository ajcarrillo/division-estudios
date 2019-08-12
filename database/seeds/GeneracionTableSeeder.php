<?php

use Illuminate\Database\Seeder;

class GeneracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generaciones = [
            [ 'inicio' => '1975', 'fin' => '2003' ],
            [ 'inicio' => '2004', 'fin' => '2009' ],
            [ 'inicio' => '2010', 'fin' => '2018' ],
        ];

        foreach ($generaciones as $generacion) {
            $g = new \Titulaciones\Models\Generacion($generacion);
            $g->save();
        }

        $generacion = \Titulaciones\Models\Generacion::find(1);
        $opciones   = \Titulaciones\Models\Opcion::whereIn('clave', [
            'I',
            'II',
            'III',
            'IV',
            'V',
            'VI',
            'VII',
            'VIII',
            'IX',
            'X',
        ])->pluck('id');
        $generacion->opciones()->attach($opciones);

        $generacion = \Titulaciones\Models\Generacion::find(2);
        $opciones   = \Titulaciones\Models\Opcion::whereIn('clave', [
            'I',
            'III',
            'VI',
            'VII',
            'X',
            'S/N',
        ])->pluck('id');
        $generacion->opciones()->attach($opciones);

        $generacion = \Titulaciones\Models\Generacion::find(3);
        $opciones   = \Titulaciones\Models\Opcion::where('id', 11)->pluck('id');
        $generacion->opciones()->attach($opciones);
    }
}
