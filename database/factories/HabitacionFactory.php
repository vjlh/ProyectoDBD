<?php

use Faker\Generator as Faker;
use app\Providers\Habitacion;

$factory->define(Habitacion::class, function (Faker $faker) {
    $id = DB::table('habitaciones')->select('id')->get();
    return [
        'id' => $id->random()->id,
        'capacidad_habitacion' => $faker->rand(1,6),
        'banio_privado' => $faker->boolean,
        'aire_acondicionado_habitacion' => $faker->boolean,
        'disponibilidad' => $faker->boolean,
        'tipo' => $faker->randomElement($array = array('Permium','VIP','Suite','Luxury','Economica')),
        'fecha_inicio' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+4 weeks', $timezone = NULL),
        'fecha_fin' => $faker->dateTimeBetween($startDate = '+4 weeks', $endDate = '+8 weeks', $timezone = NULL),
    ];
});
