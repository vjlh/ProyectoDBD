<?php

use Faker\Generator as Faker;
use app\Providers\Beneficio;

$factory->define(Beneficio::class, function (Faker $faker) {
    $id = DB::table('beneficios')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_beneficio' => $faker->name,
        'descripcion_beneficio' => $faker->text,
        'precio_beneficio' => $faker->rand(10000,50000),
    ];
});
