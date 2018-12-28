<?php

use Faker\Generator as Faker;

$factory->define(App\Beneficio_Seguro::class, function (Faker $faker) {
	$id_beneficio = DB::table('beneficios')->select('id')->get();
	$id_seguro = DB::table('seguros')->select('id')->get();
    return [
        'id_beneficio' => $id_beneficio->random()->id,
        'id_seguro' => $id_seguro->random()->id,
    ];
});
