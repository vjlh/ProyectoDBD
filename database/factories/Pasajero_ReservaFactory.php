<?php

use Faker\Generator as Faker;

$factory->define(App\Pasajero_Reserva::class, function (Faker $faker) {
	$id_pasajero = DB::table('pasajeros')->select('id')->get();
	$id_reserva = DB::table('reservas')->select('id')->get();
    return [
        'id_pasajero' => $id_pasajero->random()->id,
        'id_reserva' => $id_reserva->random()->id,
    ];
});
