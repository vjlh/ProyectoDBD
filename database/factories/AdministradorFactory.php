<?php

use Faker\Generator as Faker;
use app\Administrador;

$factory->define(Administrador::class, function (Faker $faker) {
    $id = DB::table('administradores')->select('id')->get();
    return [
        'id' => $id->random()->id,
    ];
});
