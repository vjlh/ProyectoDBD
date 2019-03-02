<?php

use Faker\Generator as Faker;

$factory->define(App\Asiento_Vuelo::class, function (Faker $faker) {
	$id_vuelo = DB::table('vuelos')->select('id')->get()->random()->id;
	$vuelo = App\Vuelo::find($id_vuelo);
    $id_asiento = DB::table('asientos')->where('id_avion','=',$vuelo->id_avion)->select('id')->get()->random()->id;
    $id_reserva = DB::table('reservas')->select('id')->get()->random()->id;
    return [
        'id_vuelo' => $id_vuelo,
        'id_asiento' => $id_asiento,
        'id_reserva' => $id_reserva,
        'disponible' => $faker->boolean,
    ];
});
