<?php

use Faker\Generator as Faker;

$factory->define(App\Aeropuerto::class, function (Faker $faker) {
    return [
        'nombre_aeropuerto' => $faker->name,
        'direccion_aeropuerto' => $faker->name,
        'telefono_aeropuerto' => $faker->phoneNumber,
        'pagina_web' => $faker->url,
    ];
});
