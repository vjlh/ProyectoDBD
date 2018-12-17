<?php

use Faker\Generator as Faker;

$factory->define(App\Asiento::class, function (Faker $faker) {
    $id_reserva = DB::table('reservas')->select('id')->get();
    $id_avion = DB::table('aviones')->select('id')->get();
    return [
    	'id_reserva' => $id_reserva->random()->id,
    	'id_avion' => $id_avion->random()->id,
        'numero_asiento' => $faker->numberBetween(1,300),
        'letra_asiento' => $faker->randomLetter,
        'precio_asiento' => $faker->randomElement($array = array(30000,50000,750000,100000)),
        'disponibilidad' => $faker->boolean,
        'cabina' => $faker->randomElement($array = array('Economica','Salon-Cama','Premium','VIP')),
    ];
});
