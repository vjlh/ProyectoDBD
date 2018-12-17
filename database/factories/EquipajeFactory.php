<?php

use Faker\Generator as Faker;

$factory->define(App\Equipaje::class, function (Faker $faker) {
	$id_pasajero = DB::table('pasajeros')->select('id')->get();
    return [
    	'id_pasajero' => $id_pasajero->random()->id,
        'ancho' => $faker->numberBetween(10,40),
        'alto' => $faker->numberBetween(10,50),
        'largo' => $faker->numberBetween(10,30),
        'tipo_equipaje' => $faker->randomElement($array = array('Maleta','Bolso','Mochila','Cartera','Maletin')),
        'restriccion_equipaje' => $faker->text,
    ];
});
