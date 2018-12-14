<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    return [
        'hora_vuelo' => $faker->time($format = 'H:i:s', $max = 'now'),
        'duracion_vuelo' => $faker->rand(1,10),
        'fecha_vuelo' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 weeks', $timezone = NULL),
        'origen_vuelo' => $faker->name, 
        'destino_vuelo' => $faker->name,
    ];
});
