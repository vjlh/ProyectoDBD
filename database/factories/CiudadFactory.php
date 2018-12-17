<?php

use Faker\Generator as Faker;

$factory->define(App\Ciudad::class, function (Faker $faker) {
    $ids_paises = \DB::table('paises')->select('id')->get();
    $id_pais = $ids_paises->random()->id;
    return [
        'nombre_ciudad' => $faker->name,
        'idioma_ciudad' => $faker->languageCode,
        'id_pais' => $id_pais,
    ];
});
