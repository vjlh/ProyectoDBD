<?php

use Faker\Generator as Faker;

$factory->define(App\Habitacion_Reserva::class, function (Faker $faker) {
	$id_habitacion = DB::table('habitaciones')->select('id')->get();
    $id_reserva = DB::table('reservas')->select('id')->get();
    return [
        'id_habitacion' => $id_habitacion->random()->id,
        'id_reserva' => $id_reserva->random()->id,
        'fecha_inicio' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 weeks', $timezone = NULL),
        'fecha_fin' => $faker->dateTimeBetween($startDate = '+3 weeks', $endDate = '+6 weeks', $timezone = NULL),
    ];
});
