<?php

use Faker\Generator as Faker;
use app\Ciudad;

$factory->define(Ciudad::class, function (Faker $faker) {
    $id = DB::table('ciudades')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_ciudad' => $faker->name,
        'idioma_ciudad' => $faker->languageCode,
    ];
});
