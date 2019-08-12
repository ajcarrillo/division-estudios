<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 13/03/18
 * Time: 21:49
 */

use Faker\Generator as Faker;

$factory->define(\Titulaciones\Models\Carrera::class, function (Faker $faker) {
    return [
        'grado'                => $faker->numerify('###'),
        'descripcion'          => $faker->word,
        'jefe_departamento_id' => factory(\Titulaciones\Models\JefeDepartamento::class)->create(),
    ];
});