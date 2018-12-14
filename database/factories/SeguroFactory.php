<?php

use Faker\Generator as Faker;

$factory->define(App\Seguro::class, function (Faker $faker) {
    return [
        'precio_seguro' => $faker->rand(20000,100000),
        'tipo_seguro' => $faker->name,
        'precio_ticket' => $faker->rand(30000,100000),
        'numero_pasajeros_seguros' => $faker->rand(1,10),
    ];
});
