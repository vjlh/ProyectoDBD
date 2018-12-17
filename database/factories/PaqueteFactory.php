<?php

use Faker\Generator as Faker;

$factory->define(App\Paquete::class, function (Faker $faker) {
    $dias = $faker->numberBetween(1,30);
    $noches = $dias-1;
    return [
        'num_dias' => $dias,
        'num_noches' => $noches,
        'precio_paquete' => $faker->randomElement($array = array(300000,350000,400000,450000)),
        'destino_paquete' => $faker->name,
    ];
});
