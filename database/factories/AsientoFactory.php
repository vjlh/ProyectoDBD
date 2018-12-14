<?php

use Faker\Generator as Faker;

$factory->define(App\Asiento::class, function (Faker $faker) {
    
    return [
        'numero_asiento' => $faker->rand(1,300),
        'letra_asiento' => $faker->randomLetter,
        'precio_asiento' => $faker->randomElement($array = array(30000,50000,750000,100000)),
        'disponibilidad' => $faker->boolean,
        'cabina' => $faker->randomElement($array = array('Economica','Salon-Cama','Premium','VIP')),
    ];
});
