<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    $id_avion = DB::table('aviones')->select('id')->get();
    $id_aeropuerto = DB::table('aeropuertos')->select('id')->get();
    return [
    	'id_avion' => $id_avion->random()->id,
    	'id_aeropuerto' => $id_aeropuerto->random()->id,
        'hora_vuelo' => $faker->time($format = 'H:i:s', $max = 'now'),
        'duracion_vuelo' => $faker->time($format = 'H:i', $max = 'now'),
        'fecha_vuelo' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 weeks', $timezone = NULL),
        'origen_vuelo' => $faker->name, 
        'destino_vuelo' => $faker->name,
    ];
});
