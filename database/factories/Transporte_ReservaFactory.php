<?php

use Faker\Generator as Faker;

$factory->define(App\Transporte_Reserva::class, function (Faker $faker) {
	$id_transporte = DB::table('transportes')->select('id')->get();
	$id_reserva = DB::table('reservas')->select('id')->get();
    return [
        'id_transporte' => $id_transporte->random()->id,
        'id_reserva' => $id_reserva->random()->id,
        'fecha_inicio' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 weeks', $timezone = NULL),
        'fecha_fin' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 weeks', $timezone = NULL),
    ];
});
