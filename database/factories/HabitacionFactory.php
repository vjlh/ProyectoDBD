<?php

use Faker\Generator as Faker;

$factory->define(App\Habitacion::class, function (Faker $faker) {
    $id_hospedaje = DB::table('hospedajes')->select('id')->get();
    return [
    	'id_hospedaje' => $id_hospedaje->random()->id,
        'capacidad_habitacion' => $faker->numberBetween(1,6),
        'banio_privado' => $faker->boolean,
        'aire_acondicionado_habitacion' => $faker->boolean,
        'disponibilidad' => $faker->boolean,
        'tipo' => $faker->randomElement($array = array('Permium','VIP','Suite','Luxury','Economica')),
    ];
});
