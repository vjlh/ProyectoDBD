<?php

use Faker\Generator as Faker;
use app\Providers\Restriccion;

$factory->define(Restriccion::class, function (Faker $faker) {
    $id = DB::table('restricciones')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_restriccion' => $faker->name,
        'descripcion_restriccion' => $faker->text,
        'sancion_restriccion' => $faker->text,
    ];
});
