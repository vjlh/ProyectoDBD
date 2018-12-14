<?php

use Faker\Generator as Faker;
use app\Historial;

$factory->define(Historial::class, function (Faker $faker) {
    $id = DB::table('historiales')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'fecha_cambio' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = NULL),
    ];
});
