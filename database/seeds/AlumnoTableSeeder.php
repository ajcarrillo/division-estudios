<?php

use Illuminate\Database\Seeder;

class AlumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumnos = [
            [
                'numero_control'  => '06390566',
                'nombre_completo' => 'RAQUEL IVET SAAVEDRA VARGAS',
                'sexo'            => 'F',
                'carrera_id'      => 3,
            ],
            [
                'numero_control'  => '10390333',
                'nombre_completo' => 'MIGUEL SAAVEDRA VARGAS',
                'sexo'            => 'M',
                'carrera_id'      => 2,
            ],
            [
                'numero_control'  => '03390333',
                'nombre_completo' => 'ANDRES DE JESUS CARRILLO HERRERA',
                'sexo'            => 'M',
                'carrera_id'      => 3,
            ],
            [
                'numero_control'  => 'A03390533',
                'nombre_completo' => 'JOHN DOE',
                'sexo'            => 'M',
                'carrera_id'      => 4,
            ],
        ];

        foreach ($alumnos as $alumno) {
            $a = new \Titulaciones\Models\Alumno($alumno);
            $a->save();
        }
    }
}
