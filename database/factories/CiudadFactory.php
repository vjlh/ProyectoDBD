<?php

use Faker\Generator as Faker;

$factory->define(App\Ciudad::class, function (Faker $faker) {
    return [
        'nombre_ciudad' => $faker->name,
        'idioma_ciudad' => $faker->languageCode,
    ];
});
