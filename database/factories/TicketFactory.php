<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
	$id_reserva = DB::table('reservas')->select('id')->get();
    return [
    	'id_reserva' => $id_reserva->random()->id,
        'tipo_pago' => $faker->randomElement($array = array('Credito','Debito','Efectivo','Cheque')),
        'monto_pago' => $faker->numberBetween(10000,100000),
        'fecha_pago' => $faker->dateTimeBetween($startDate = '-8 weeks', $endDate = 'now', $timezone = NULL),
    ];
});
