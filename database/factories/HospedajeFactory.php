<?php

use Faker\Generator as Faker;

$factory->define(App\Hospedaje::class, function (Faker $faker) {
    $cantidad = 
    return [
        'nombre_hospedaje' => $faker->name,
        'cadena_hospedaje' => $faker->name,
        'estrellas_hospedaje' => $faker->numberBetween(1,6),
        'estacionamiento_hospedaje' => $faker->boolean,
        'piscina_hospedaje' => $faker->boolean,
        'sauna_hospedaje' => $faker->boolean,
        'zona_infantil_hospedaje' => $faker->boolean,
        'gimnasio_hospedaje' => $faker->boolean,
        'cantidad_disponible' => $faker->randomElement($array = array(20,30,40,50,60)),
    ];
});
