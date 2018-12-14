<?php

use Faker\Generator as Faker;
use app\Providers\Pais;

$factory->define(Pais::class, function (Faker $faker) {
    $id = DB::table('paises')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_pais' => $faker->name,
        'moneda_pais' => $faker->currencyCode,
    ];
});
