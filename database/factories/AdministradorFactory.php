<?php

use Faker\Generator as Faker;

$factory->define(App\Administrador::class, function (Faker $faker) {
	$id_user = DB::table('users')->select('id')->get();
    return [
        'id_user' => $id_user->random()->id,
        
    ];
});
