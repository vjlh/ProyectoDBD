<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
	$id_transporte = DB::table('transportes')->select('id')->get();
	$id_reserva = DB::table('reservas')->select('id')->get();
    return [
        'id_transporte' => $id_transporte->random()->id,
        'id_reserva' => $id_reserva->random()->id,
    ];
});
