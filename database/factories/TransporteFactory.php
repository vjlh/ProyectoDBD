<?php

use Faker\Generator as Faker;

$factory->define(App\Transporte::class, function (Faker $faker) {
    return [
        //'patente_transporte' => $faker->lexify('##') + $faker->numerify('####'),
        'precio' => $faker->randomElement($array = array(30000,50000,750000,100000)),
        'patente_transporte' => $faker->numberBetween(1,9999),
        'modelo_transporte' => $faker->name,
        'num_asientos_transporte' => $faker->numberBetween(1,8),
        'num_puertas_transporte' => $faker->numberBetween(2,8),
        'aire_acondicionado_transporte' => $faker->boolean,
        'disponibilidad' => $faker->boolean,
        'puntuacion_transporte' => $faker->numberBetween(1,6),

    ];
});
