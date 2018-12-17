<?php

use Faker\Generator as Faker;

$factory->define(App\Aeropuerto::class, function (Faker $faker) {
    $id_ciudad = DB::table('ciudades')->select('id')->get();
    return [
        'id_ciudad' => $id_ciudad->random()->id,
        'nombre_aeropuerto' => $faker->name,
        'direccion_aeropuerto' => $faker->name,
        'telefono_aeropuerto' => $faker->phoneNumber,
        'pagina_web' => $faker->url,
    ];
});
