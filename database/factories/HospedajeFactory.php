<?php

use Faker\Generator as Faker;
use app\Providers\Hospedaje;

$factory->define(Hospedaje::class, function (Faker $faker) {
    $id = DB::table('hospedajes')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_hospedaje' => $faker->name,
        'cadena_hospedaje' => $faker->name,
        'estrellas_hospedaje' => $faker->rand(1,6),
        'estacionamiento_hospedaje' => $faker->boolean,
        'piscina_hospedaje' => $faker->boolean,
        'sauna_hospedaje' => $faker->boolean,
        'zona_infantil_hospedaje' => $faker->boolean,
        'gimnasio_hospedaje' => $faker->boolean,
    ];
});
