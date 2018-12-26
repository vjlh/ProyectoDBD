<?php

use Faker\Generator as Faker;

$factory->define(App\Avion::class, function (Faker $faker) {
    $id_vuelo = DB::table('vuelos')->select('id')->get();
    return [
        'id_vuelo' => $id_vuelo->random()->id,
        'capacidad_avion' => $faker->randomElement($array = array(100,150,200,250,300)),
        'salidas_emergencia' => $faker->numberBetween(1,20),
        'sanitarios_avion' => $faker->numberBetween(1,10),
        'longitud_avion' => $faker->numberBetween(100,200),
        'envergadura_avion' => $faker->randomElement($array = array('Grande','Chico','Mediano')),
    ];
});
