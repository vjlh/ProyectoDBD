<?php


use Faker\Generator as Faker;

$factory->define(App\Transporte::class, function (Faker $faker) {
    $city = DB::table('ciudades')->select('nombre_ciudad')->get();
    $ciudades = array('Florencia','Pekín','Budapest','Bombay','Berlín','Orlando','Nueva Delhi',
    'Johannesburgo','Moscú','Venecia','Los Ángeles','Viena','Ámsterdam','Barcelona',
    'Tokio','Milán','La Meca','Las Vegas','Praga','Shanghái','Pattaya','Miami',
    'Phuket','Guangzhou','Taipéi','Roma','Seúl','Dubái','Antalya','Kuala Lumpur',
    'Estambul','Nueva York','Shenzhen','Macao','París','Bangkok','Singapur',
    'Londres','Hong Kong','Cancun','Bariloche','Mendoza','Rio de Janeiro',
    'Valparaiso','Temuco','Arica','Puerto Montt','Punta Cana','PercyTown','Santiago',
    'Sao paulo','Chiloe','Isla de Pascua');
    return [
        //'patente_transporte' => $faker->lexify('##') + $faker->numerify('####'),
        'precio' => $faker->randomElement($array = array(30000,50000,750000,100000)),
        'patente_transporte' => $faker->numberBetween(1,9999),
        'modelo_transporte' => $faker->name,
        'num_asientos_transporte' => $faker->numberBetween(1,8),
        'num_puertas_transporte' => $faker->numberBetween(2,8),
        'aire_acondicionado_transporte' => $faker->boolean,
        'disponibilidad' => $faker->boolean,
        'puntuacion_transporte' => $faker->numberBetween(1,6),
        'ubicacion' => $city->random()->nombre_ciudad,

    ];
});
