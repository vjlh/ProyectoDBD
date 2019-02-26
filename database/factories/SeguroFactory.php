<?php

use Faker\Generator as Faker;

$factory->define(App\Seguro::class, function (Faker $faker) {
    return [
        'precio_seguro' => $faker->numberBetween(20000,100000),
        'tipo_seguro' => $faker->name,
        'destino_seguro' => $faker->randomElement($array = array('Africa','Asia','Centroamerica','Europa','Latinoamerica','Norteamerica','Oceania')),
        'numero_pasajeros_seguros' => $faker->numberBetween(1,10),
        'fecha_inicio_seguro' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 weeks', $timezone = NULL),
        'fecha_fin_seguro' => $faker->dateTimeBetween($startDate = '+3 weeks', $endDate = '+6 weeks', $timezone = NULL),
    ];
});
