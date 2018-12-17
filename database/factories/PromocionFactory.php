<?php

use Faker\Generator as Faker;

$factory->define(App\Promocion::class, function (Faker $faker) {

    return [
        'nombre_promocion' => $faker->name,
        'descuento_promocion' => $faker->numberBetween(1,100),
        'descripcion_promocion' => $faker->text,
    ];
});
