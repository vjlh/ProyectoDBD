<?php

use Faker\Generator as Faker;

$factory->define(App\Pasajero::class, function (Faker $faker) {
    return [

        'nombre_pasajero' => $faker->firstName,
        'apellido_pasajero' => $faker->lastName,
        'edad_pasajero' => $faker->numberBetween(1,100),
        'tipo_pasajero' => $faker->randomElement($array = array('bebe','joven','adulto','adulto_mayor')),
    ];
});
