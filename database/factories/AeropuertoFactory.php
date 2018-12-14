<?php

use Faker\Generator as Faker;

$factory->define(App\Aeropuerto::class, function (Faker $faker) {
    return [
        'nombre_aeropuerto' => $faker->name,
        'direccion_aeropuerto' => $faker->address,
        'telefono_aeropuerto' => $faker->phone,
        'pagina_web' => $faker->url,
    ];
});
