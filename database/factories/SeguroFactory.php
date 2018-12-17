<?php

use Faker\Generator as Faker;

$factory->define(App\Seguro::class, function (Faker $faker) {
    return [
        'precio_seguro' => $faker->numberBetween(20000,100000),
        'tipo_seguro' => $faker->name,
        'precio_ticket' => $faker->numberBetween(30000,100000),
        'numero_pasajeros_seguros' => $faker->numberBetween(1,10),
    ];
});
