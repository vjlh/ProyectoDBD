<?php
use Faker\Generator as Faker;

$factory->define(App\Ciudad::class, function (Faker $faker) {
    $ids_paises = \DB::table('paises')->select('id')->get();
    $id_pais = $ids_paises->random()->id;
    $ciudades = array('Florencia','Pekín','Budapest','Bombay','Berlín','Orlando','Nueva Delhi',
    'Johannesburgo','Moscú','Venecia','Los Ángeles','Viena','Ámsterdam','Barcelona',
    'Tokio','Milán','La Meca','Las Vegas','Praga','Shanghái','Pattaya','Miami',
    'Phuket','Guangzhou','Taipéi','Roma','Seúl','Dubái','Antalya','Kuala Lumpur',
    'Estambul','Nueva York','Shenzhen','Macao','París','Bangkok','Singapur',
    'Londres','Hong Kong','Cancun','Bariloche','Mendoza','Rio de Janeiro',
    'Valparaiso','Temuco','Arica','Puerto Montt','Punta Cana','PercyTown','Santiago',
    'Sao paulo','Chiloe','Isla de Pascua');
    return [
        'idioma_ciudad' => $faker->languageCode,
        'id_pais' => $id_pais,
        'nombre_ciudad' => $faker->unique()->randomElement($ciudades)

    ];

    

});
