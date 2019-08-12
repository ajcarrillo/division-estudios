<?php

use Illuminate\Database\Seeder;

class JefeDepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jefes = [
            [ 1, 'JEFE DE DEPTO. DE ECONOMICO ADMINISTRATIVAS', 'DR. EUSTACIO DÍAZ RODRÍGUEZ', ],
            [ 2, 'JEFE DE DEPTO. DE QUÍMICA Y BIOQUÍMICA', 'M.en C. ALEJANDRO MÉDINA QUEJ', ],
            [ 3, 'JEFE DE DEPTO. DE SISTEMAS Y COMPUTACIÓN', 'LIC. LUIS ERNESTO ROSADO CEPEDA', ],
            [ 4, 'JEFA DE DEPTO. DE CIENCIAS DE LA TIERRA', 'ING.  MARITZA CHAN JUÁREZ', ],
            [ 5, 'JEFE DE DEPTO. DE ELÉCTRICA Y ELECTRÓNICA', 'ING. DAVID DE JESÚS SANTILLÁN SANVICENTE', ],
        ];

        foreach ($jefes as $jefe) {
            $j = new \Titulaciones\Models\JefeDepartamento([
                'id'             => $jefe[0],
                'responsable_id' => \Titulaciones\User::where('name', $jefe[2])->first()->id,
                'jefatura'       => $jefe[1],
            ]);
            $j->save();
        }
    }
}
