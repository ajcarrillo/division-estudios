<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 13/03/18
 * Time: 21:49
 */

use Faker\Generator as Faker;

$factory->define(\DivisionEstudios\Models\Opcion::class, function (Faker $faker) {
    return [
        'clave'       => $faker->numerify('###'),
        'descripcion' => $faker->word,
    ];
});
