<?php

use Faker\Generator as Faker;

$factory->define(App\Habitacion::class, function (Faker $faker) {
    $id_hospedaje = DB::table('hospedajes')->select('id')->get();
    return [
        'precio' => $faker->randomElement($array = array(30000,50000,750000,100000)),
    	'id_hospedaje' => $id_hospedaje->random()->id,
        'capacidad_habitacion' => $faker->numberBetween(1,7),
        'banio_privado' => $faker->boolean,
        'aire_acondicionado_habitacion' => $faker->boolean,
        'disponibilidad' => $faker->boolean,
        'tipo' => $faker->randomElement($array = array('Premium','VIP','Suite','Luxury','Economica')),
    ];
});
