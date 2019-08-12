<?php

use Illuminate\Database\Seeder;

class OpcionModuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opciones = [
            [ 'clave' => 'I', 'descripcion' => 'TESIS PROFESIONAL' ],
            [ 'clave' => 'II', 'descripcion' => 'LIBRO DE TEXTO O PROTOTIPOS DIDÁCTICOS' ],
            [ 'clave' => 'III', 'descripcion' => 'PROYECTOS DE INVESTIGACIÓN' ],
            [ 'clave' => 'IV', 'descripcion' => 'DISEÑO O REDISEÑO DE EQUIPO, APARATO O MAQUINARIA' ],
            [ 'clave' => 'V', 'descripcion' => 'CURSOS ESPECIALES DE TITULACIÓN' ],
            [ 'clave' => 'VI', 'descripcion' => 'EXAMEN GLOBAL POR AREAS DE CONOCIMIENTO' ],
            [ 'clave' => 'VII', 'descripcion' => 'MEMORIA DE EXPERIENCIA PROFESIONAL' ],
            [ 'clave' => 'VIII', 'descripcion' => 'ESCOLARIDAD PROMEDIO' ],
            [ 'clave' => 'IX', 'descripcion' => 'ESCOLARIDAD POR ESTUDIOS DE POSGRADO' ],
            [ 'clave' => 'X', 'descripcion' => 'MEMORIA DE RESIDENCIA PROFESIONAL' ],
            [ 'clave' => '', 'descripcion' => 'TITULACIÓN INTEGRAL' ],
            [ 'clave' => 'S/N', 'descripcion' => 'TITULACIÓN INTEGRADA' ],
        ];

        $modulos = [
            [ 'descripcion' => 'INFORME TÉCNICO DE RESIDENCIA PROFESIONAL' ],
            [ 'descripcion' => 'PROYECTO DE INNOVACIÓN TECNOLÓGICA' ],
            [ 'descripcion' => 'PROYECTO DE INVESTIGACIÓN' ],
            [ 'descripcion' => 'ESTANCIAS, VERANOS CIENTIFICOS' ],
            [ 'descripcion' => 'TESIS' ],
            [ 'descripcion' => 'EGEL' ],
        ];

        foreach ($opciones as $opcion) {
            $o = new \Titulaciones\Models\Opcion($opcion);
            $o->save();
        }

        foreach ($modulos as $modulo) {
            $m = new \Titulaciones\Models\Modulo($modulo);
            $m->save();
        }

        $opcion  = \Titulaciones\Models\Opcion::where('descripcion', 'TITULACIÓN INTEGRAL')->first();
        $modulos = \Titulaciones\Models\Modulo::whereIn('descripcion', [
            'INFORME TÉCNICO DE RESIDENCIA PROFESIONAL',
            'PROYECTO DE INNOVACIÓN TECNOLÓGICA',
            'PROYECTO DE INVESTIGACIÓN',
            'ESTANCIAS, VERANOS CIENTIFICOS',
            'TESIS',
            'EGEL',
        ])->pluck('id');

        $opcion->modulos()->attach($modulos);
    }
}
