<?php

use Faker\Generator as Faker;

$factory->define(App\Transporte::class, function (Faker $faker) {
    return [
        'patente_transporte' => $faker->lexify('##') + $faker->numerify('####'),
        'modelo_transporte' => $faker->name,
        'num_asientos_transporte' => $faker->rand(1,8),
        'num_puertas_transporte' => $faker->rand(2,8),
        'aire_acondicionado_transporte' => $faker->boolean,
        'puntuacion_transporte' => $faker->rand(1,6),
        'fecha_inicio' => $faker->dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = NULL),
        'fecha_fin' =>$faker->dateTimeBetween($startDate = '+4 weeks', $endDate = '+8 weeks', $timezone = NULL),

    ];
});
