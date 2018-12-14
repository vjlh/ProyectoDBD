<?php

use Faker\Generator as Faker;
use app\Paquete;

$factory->define(Paquete::class, function (Faker $faker) {
    $id = DB::table('paquetes')->select('id')->get();
    $dias = $faker->rand(1,30);
    $noches = $dias-1;
    return [
        'id' => $id->random()->id,
        'num_dias' => $dias,
        'num_noches' => $noches,
        'precio_paquete' => $faker->randomElement($array = array(300000,350000,400000,450000),
        'destino_paquete' => $faker->name,
    ];
});
