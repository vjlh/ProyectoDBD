<?php

use Faker\Generator as Faker;

$factory->define(App\Historial::class, function (Faker $faker) {
    return [
        'fecha_cambio' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = NULL),
    ];
});
