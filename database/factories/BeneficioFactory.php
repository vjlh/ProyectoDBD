<?php

use Faker\Generator as Faker;

$factory->define(App\Beneficio::class, function (Faker $faker) {

    return [
        'nombre_beneficio' => $faker->name,
        'descripcion_beneficio' => $faker->text,
        'precio_beneficio' => $faker->numberBetween(10000,50000),
    ];
});
