<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    $id_avion = DB::table('aviones')->select('id')->get();
    $id_aeropuerto = DB::table('aeropuertos')->select('id')->get();
    $ciudades = array('Florencia','Pekín','Budapest','Bombay','Berlín','Orlando','Nueva Delhi',
    'Johannesburgo','Moscú','Venecia','Los Ángeles','Viena','Ámsterdam','Barcelona',
    'Tokio','Milán','La Meca','Las Vegas','Praga','Shanghái','Pattaya','Miami',
    'Phuket','Guangzhou','Taipéi','Roma','Seúl','Dubái','Antalya','Kuala Lumpur',
    'Estambul','Nueva York','Shenzhen','Macao','París','Bangkok','Singapur',
    'Londres','Hong Kong','Cancun','Bariloche','Mendoza','Rio de Janeiro',
    'Valparaiso','Temuco','Arica','Puerto Montt','Punta Cana','PercyTown','Santiago',
    'Sao paulo','Chiloe','Isla de Pascua');

    return [
    	'id_avion' => $id_avion->random()->id,
    	'id_aeropuerto' => $id_aeropuerto->random()->id,
        'hora_vuelo' => $faker->time($format = 'H:i:s', $max = 'now'),
        'duracion_vuelo' => $faker->time($format = 'H:i', $max = 'now'),
        'fecha_vuelo' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 weeks', $timezone = NULL),
        'origen_vuelo' => $faker->randomElement($ciudades), 
        'destino_vuelo' => $faker->randomElement($ciudades),
    ];
});
