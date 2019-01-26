<?php

use Faker\Generator as Faker;

$factory->define(App\Paquete::class, function (Faker $faker) {
    $dias = $faker->numberBetween(1,30);
    $noches = $dias-1;
    $ciudades = array('Florencia','Pekín','Budapest','Bombay','Berlín','Orlando','Nueva Delhi',
    'Johannesburgo','Moscú','Venecia','Los Ángeles','Viena','Ámsterdam','Barcelona',
    'Tokio','Milán','La Meca','Las Vegas','Praga','Shanghái','Pattaya','Miami',
    'Phuket','Guangzhou','Taipéi','Roma','Seúl','Dubái','Antalya','Kuala Lumpur',
    'Estambul','Nueva York','Shenzhen','Macao','París','Bangkok','Singapur',
    'Londres','Hong Kong','Cancun','Bariloche','Mendoza','Rio de Janeiro',
    'Valparaiso','Temuco','Arica','Puerto Montt','Punta Cana','PercyTown','Santiago',
    'Sao paulo','Chiloe','Isla de Pascua');
    return [
        'num_dias' => $dias,
        'num_noches' => $noches,
        'precio_paquete' => $faker->randomElement($array = array(300000,350000,400000,450000)),
        'destino_paquete' => $faker->randomElement($ciudades)
    ];
});
