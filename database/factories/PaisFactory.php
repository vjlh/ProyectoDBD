<?php

use Faker\Generator as Faker;

$factory->define(Pais::class, function (Faker $faker) {
    return [
        'nombre_pais' => $faker->name,
        'moneda_pais' => $faker->currencyCode,
    ];
});
