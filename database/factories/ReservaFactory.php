<?php

use Faker\Generator as Faker;
use app\Providers\Reserva;

$factory->define(Reserva::class, function (Faker $faker) {
    $id = DB::table('reservas')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'monto_total_reserva' => $faker->rand(20000,1000000),
        'check_in' => $faker->boolean,
    ];
});
