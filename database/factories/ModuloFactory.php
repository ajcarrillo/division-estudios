<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 13/03/18
 * Time: 21:49
 */

use Faker\Generator as Faker;

$factory->define(\DivisionEstudios\Models\Modulo::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->word,
    ];
});
