<?php

use Faker\Generator as Faker;

$factory->define(App\Historial::class, function (Faker $faker) {
    $id_user = DB::table('users')->select('id')->get();
    return [
    	'id_user' => $id_user->random()->id,
        'fecha_cambio' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = NULL),
    ];
});
