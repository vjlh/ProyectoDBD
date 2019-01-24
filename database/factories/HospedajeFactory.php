<?php

use Faker\Generator as Faker;

$factory->define(App\Hospedaje::class, function (Faker $faker) {
    $ciudades = array('Florencia','Pekín','Budapest','Bombay','Berlín','Orlando','Nueva Delhi',
    'Johannesburgo','Moscú','Venecia','Los Ángeles','Viena','Ámsterdam','Barcelona',
    'Tokio','Milán','La Meca','Las Vegas','Praga','Shanghái','Pattaya','Miami',
    'Phuket','Guangzhou','Taipéi','Roma','Seúl','Dubái','Antalya','Kuala Lumpur',
    'Estambul','Nueva York','Shenzhen','Macao','París','Bangkok','Singapur',
    'Londres','Hong Kong','Cancun','Bariloche','Mendoza','Rio de Janeiro',
    'Valparaiso','Temuco','Arica','Puerto Montt','Punta Cana','PercyTown','Santiago',
    'Sao paulo','Chiloe','Isla de Pascua');
    return [
        'nombre_hospedaje' => $faker->name,
        'ubicacion' => $faker->randomElement($ciudades),
        'cadena_hospedaje' => $faker->name,
        'estrellas_hospedaje' => $faker->numberBetween(1,6),
        'estacionamiento_hospedaje' => $faker->boolean,
        'piscina_hospedaje' => $faker->boolean,
        'sauna_hospedaje' => $faker->boolean,
        'zona_infantil_hospedaje' => $faker->boolean,
        'gimnasio_hospedaje' => $faker->boolean,
        'cantidad_disponible' => $faker->randomElement($array = array(20,30,40,50,60)),
    ];
});
