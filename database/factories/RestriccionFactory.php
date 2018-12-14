<?php

use Faker\Generator as Faker;

$factory->define(App\Restriccion::class, function (Faker $faker) {
    return [
        'nombre_restriccion' => $faker->name,
        'descripcion_restriccion' => $faker->text,
        'sancion_restriccion' => $faker->text,
    ];
});
