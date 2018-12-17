<?php

use Faker\Generator as Faker;

$factory->define(App\Pais::class, function (Faker $faker) {
    return [
        'nombre_pais' => $faker->name,
        'moneda_pais' => $faker->currencyCode,
    ];
});
