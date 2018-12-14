<?php

use Faker\Generator as Faker;
use app\Providers\Vuelo;

$factory->define(Vuelo::class, function (Faker $faker) {
    $id = DB::table('vuelos')->select('id')->get();
    $ciudad = DB::table('ciudades')->select('nombre_ciudad')->get();
    return [
        'id' => $id->random()->id,
        'hora_vuelo' => $faker->time($format = 'H:i:s', $max = 'now')
        'duracion_vuelo' => $faker->rand(1,10),
        'fecha_vuelo' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 weeks', $timezone = NULL),
        'origen_vuelo' => $ciudad->random()->nombre_ciudad, 
        'destino_vuelo' => $ciudad->random()->nombre_ciudad,
    ];
});
