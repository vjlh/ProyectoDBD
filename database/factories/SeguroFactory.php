<?php

use Faker\Generator as Faker;
use app\Seguro;

$factory->define(Seguro::class, function (Faker $faker) {
    $id = DB::table('seguros')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'precio_seguro' => $faker->rand(20000,100000),
        'tipo_seguro' => $faker->name,
        'precio_ticket' => $faker->rand(30000,100000),
        'numero_pasajeros_seguros' => $faker->rand(1,10),
    ];
});
