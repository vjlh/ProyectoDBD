<?php

use Faker\Generator as Faker;

$factory->define(App\Beneficio::class, function (Faker $faker) {

    $beneficios = array('Beneficios de Accidentes personales','Beneficios médicos y dentales'
    ,'Beneficios de cancelación y cambio de Viaje','Beneficios de cancelación y cambio de Viaje',
    'Beneficios de Equipaje y Propiedad Personal','Beneficios Legales','Beneficios para su tranquilidad');

    return [
        'nombre_beneficio' => $faker->unique()->randomElement($beneficios),
        'descripcion_beneficio' => $faker->realText(100),
        'precio_beneficio' => $faker->numberBetween(10000,50000),
    ];
});
