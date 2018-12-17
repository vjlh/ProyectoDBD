<?php

use Faker\Generator as Faker;

$factory->define(App\Restriccion::class, function (Faker $faker) {
    $id_ciudad = DB::table('ciudades')->select('id')->get();
    return [
    	'id_ciudad' => $id_ciudad->random()->id,
        'nombre_restriccion' => $faker->name,
        'descripcion_restriccion' => $faker->text,
        'sancion_restriccion' => $faker->text,
    ];
});
