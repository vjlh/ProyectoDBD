<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
    $id_user = DB::table('users')->select('id')->get();
    $id_seguro = DB::table('seguros')->select('id')->get();
    $id_promocion = DB::table('promociones')->select('id')->get();
    $id_paquete = DB::table('paquetes')->select('id')->get();
    
    return [
        'monto_total_reserva' => $faker->numberBetween(20000,1000000),
        'check_in' => $faker->boolean,
        'id_user' => $id_user->random()->id,
        'id_seguro' => $id_seguro->random()->id,
        'id_promocion' => $id_promocion->random()->id,
        'transporte' => $faker->boolean, 
        'hospedaje' => $faker->boolean, 
        'vuelo' => $faker->boolean
    ];
});
