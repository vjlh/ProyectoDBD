<?php

use Faker\Generator as Faker;
use app\Aeopuerto;

$factory->define(Aeropuerto::class, function (Faker $faker) {
    $id = DB::table('aeropuertos')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_aeropuerto' => $faker->name,
        'direccion_aeropuerto' => $faker->address,
        'telefono_aeropuerto' => $faker->phone,
        'pagina_web' => $faker->url,
    ];
});
