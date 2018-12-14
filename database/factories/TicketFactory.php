<?php

use Faker\Generator as Faker;
use app\Providers\Ticket;

$factory->define(Ticket::class, function (Faker $faker) {
    $id = DB::table('tickets')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'tipo_pago' => $faker->randomElement($array = array('Credito','Debito','Efectivo','Cheque')),
        'monto_pago' => $faker->rand(10000,100000),
        'fecha_pago' => $faker->dateTimeBetween($startDate = '-8 weeks', $endDate = 'now', $timezone = NULL),
    ];
});
