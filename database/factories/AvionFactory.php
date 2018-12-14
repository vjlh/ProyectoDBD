<?php

use Faker\Generator as Faker;
use app\Providers\Avion;

$factory->define(Avion::class, function (Faker $faker) {
    $id = DB::table('aviones')->select('id')->get();

    return [
        'id' => $id->random()->id,
        'capacidad_avion' => $faker->randomElement($array = array(100,150,200,250,300)),
        'salidas_emergencia' => $faker->rand(1,20),
        'sanitarios_avion' => $faker->rand(1,10),
        'longitud_avion' => $faker->rand(100,200),
        'envergadura_avion' => $faker->randomElement($array = array('Grande','Chico','Mediano')),
    ];
});
