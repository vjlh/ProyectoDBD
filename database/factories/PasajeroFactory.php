<?php

use Faker\Generator as Faker;
use app\Providers\Pasajero;

$factory->define(Pasajero::class, function (Faker $faker) {
    $id = DB::table('pasajeros')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_pasajero' => $faker->firstName,
        'apellido_pasajero' => $faker->lastName,
        'edad_pasajero' => $faker->rand(1,100),
        'tipo_pasajero' => $faker->randomElement($array = array('bebe','joven','adulto','adulto_mayor')),
    ];
});
