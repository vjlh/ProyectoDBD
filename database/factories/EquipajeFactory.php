<?php

use Faker\Generator as Faker;
use app\Equipaje;

$factory->define(Equipaje::class, function (Faker $faker) {
    return [
        'ancho' => $faker->rand(10,40),
        'alto' => $faker->rand(10,50),
        'largo' => $faker->rand(10,30),
        'tipo_equipaje' => $faker->randomElement($array = array('Maleta','Bolso','Mochila','Cartera','Maletin')),
        'restriccion_equipaje' => $faker->text,
    ];
});
