<?php

use Faker\Generator as Faker;

$factory->define(App\Avion::class, function (Faker $faker) {
    $capacidad = $faker->randomElement($array = array(100,150,200,250,300));
    return [
        'capacidad_avion' => $capacidad,
        'cantidad_disponible' => $capacidad, 
        'salidas_emergencia' => $faker->numberBetween(1,20),
        'sanitarios_avion' => $faker->numberBetween(1,10),
        'longitud_avion' => $faker->numberBetween(100,200),
        'envergadura_avion' => $faker->randomElement($array = array('Grande','Chico','Mediano')),
    ];
});
