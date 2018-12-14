<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
    return [
        'monto_total_reserva' => $faker->rand(20000,1000000),
        'check_in' => $faker->boolean,
    ];
});
