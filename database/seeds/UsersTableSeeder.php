<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\DivisionEstudios\User::class, 1)->create(
            [
                'name'  => 'LIC. RAQUEL IVET SAAVEDRA VARGAS',
                'email' => 'profesionales@itchetumal.edu.mx',
            ]
        );

        $jefesDeptos = [
            [ 'name' => 'DR. EUSTACIO DÍAZ RODRÍGUEZ', ],
            [ 'name' => 'M.en C. ALEJANDRO MÉDINA QUEJ', ],
            [ 'name' => 'LIC. LUIS ERNESTO ROSADO CEPEDA', ],
            [ 'name' => 'ING.  MARITZA CHAN JUÁREZ', ],
            [ 'name' => 'ING. DAVID DE JESÚS SANTILLÁN SANVICENTE', ],
        ];

        $escolares = [
            [ 'name' => 'LIC. MELISA MENDOZA GIL' ],
        ];

        $titulacion = [
            [
                'name'  => 'LIC. GRETY HERNÁNDEZ',
                'email' => 'titulacion@itchetumal.edu.mx',
            ],
        ];

        foreach ($titulacion as $user) {
            factory(\DivisionEstudios\User::class, 1)->create([
                'name'  => $user['name'],
                'email' => $user['email'],
            ])->each(function ($u) {

            });
        }

        foreach ($jefesDeptos as $jefesDepto) {
            factory(\DivisionEstudios\User::class, 1)->create([
                'name' => $jefesDepto['name'],
            ])->each(function ($u) {

            });
        }

        foreach ($escolares as $user) {
            factory(\DivisionEstudios\User::class, 1)->create([
                'name' => $user['name'],
            ])->each(function ($u) {

            });
        }
    }
}
