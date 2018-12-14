<?php

use Faker\Generator as Faker;
use app\Providers\Promocion;

$factory->define(Promocion::class, function (Faker $faker) {
    $id = DB::table('promociones')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'nombre_promocion' => $faker->name,
        'descuento_promocion' => $faker->rand(1,100),
        'descripcion_promocion' => $faker->text,
    ];
});
