<?php

use Faker\Generator as Faker;
use App\Vuelo;
use App\Hospedaje;
use App\Habitacion;
use App\Transporte;

$factory->define(App\Paquete::class, function (Faker $faker) {
    //se inicializan los id nulos, ya que no se sabe cual será el tipo de paquete, luego se reemplazan estos valores
    $id_hospedaje = NULL;
    $id_habitacion = NULL;
    $id_transporte = NULL;

    $fecha_paquete = $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 weeks', $timezone = NULL);
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
    $destino = $faker->randomElement($ciudades);
    $tipo_paquete = $faker->randomElement($array = array('Alojamiento','Automóvil','All'));

    $vuelosUbicacion = Vuelo::All()->where('destino_vuelo', '=', $destino)
                                   ->where('fecha_vuelo','=', $fecha_paquete);
    $vuelos = [];
    foreach ($vuelosUbicacion as $vuelo) {
        array_push($vuelos,$vuelo);
    }
    $lenVuelos = sizeof($vuelos);
    $randomVuelos = rand(0,$lenVuelos);
    $vuelo = $vuelos[$randomVuelos];


    if($tipo_paquete == 'Alojamiento'){
        $hospedajesUbicacion = Hospedaje::All()->where('ubicacion','=',$destino);
        $tipo_habitacion = $faker->randomElement($array = array('Premium','VIP','Suite','Luxury','Economica'));
        $totalHabitaciones = Habitacion::All()->where('tipo','=', $tipo_habitacion);
        //se buscan los hospedajes que posean al menos una habitacion del tipo de habitacion ofrecida en el paquete por cada hospedaje existente en el destino
        $hospedajes = [];
        foreach ($hospedajesUbicacion as $hospedaje) {
            foreach ($totalHabitaciones as $habitacion) {
                if($habitacion->id_hospedaje == $hospedaje->id){
                    array_push($hospedajes,$hospedaje);
                }
            }
        }
        $lenHospedajes = sizeof($hospedajes);
        $randomHospedajes = rand(0,$lenHospedajes-1);
        $hospedaje = $hospedajes[$randomHospedajes];
        
        $habitacionesHospedaje = Habitacion::All()->where('tipo', '=', $tipo_habitacion)
                                                  ->where('id_hospedaje', '=', $hospedaje->id);
        $habitaciones = [];
        foreach ($habitacionesHospedaje as $habitacion) {
            array_push($habitaciones,$habitacion);
        }
        $lenHabitaciones = sizeof($habitaciones);
        $randomHabitacion = rand(0,$lenHabitaciones-1);
        $habitacion = $habitaciones[$randomHabitacion]; 
    }

    elseif($tipo_paquete == 'Automóvil'){
        $transportesUbicacion = Transporte::All()->where('ubicacion','=',$destino);
        $transportes = [];
        foreach ($transportesUbicacion as $transporte) {
            array_push($transportes, $transporte);
        }
        $lenTransporte = sizeof($transportes);
        $randomTransporte = rand(0,$lenTransporte-1);
        $transporte = $transportes[$randomTransporte];
    }

    elseif($tipo_paquete == 'All'){
        $hospedajesUbicacion = Hospedaje::All()->where('ubicacion','=',$destino);
        $tipo_habitacion = $faker->randomElement($array = array('Premium','VIP','Suite','Luxury','Economica'));
        $totalHabitaciones = Habitacion::All()->where('tipo','=', $tipo_habitacion);
        //se buscan los hospedajes que posean al menos una habitacion del tipo de habitacion ofrecida en el paquete por cada hospedaje existente en el destino
        $hospedajes = [];
        foreach ($hospedajesUbicacion as $hospedaje) {
            foreach ($totalHabitaciones as $habitacion) {
                if($habitacion->id_hospedaje == $hospedaje->id){
                    array_push($hospedajes,$hospedaje);
                }
            }
        }
        $lenHospedajes = sizeof($hospedajes);
        $randomHospedajes = rand(0,$lenHospedajes-1);
        $hospedaje = $hospedajes[$randomHospedajes];
        
        $habitacionesHospedaje = Habitacion::All()->where('tipo', '=', $tipo_habitacion)
                                                  ->where('id_hospedaje', '=', $hospedaje->id);
        $habitaciones = [];
        foreach ($habitacionesHospedaje as $habitacion) {
            array_push($habitaciones,$habitacion);
        }
        $lenHabitaciones = sizeof($habitaciones);
        $randomHabitacion = rand(0,$lenHabitaciones-1);
        $habitacion = $habitaciones[$randomHabitacion];

        $transportesUbicacion = Transporte::All()->where('ubicacion','=',$destino);
        $transportes = [];
        foreach ($transportesUbicacion as $transporte) {
            array_push($transportes, $transporte);
        }
        $lenTransporte = sizeof($transportes);
        $randomTransporte = rand(0,$lenTransporte-1);
        $transporte = $transportes[$randomTransporte];

    }
    return [
        'num_dias' => $dias,
        'num_noches' => $noches,
        'tipo_paquete' => $tipo_paquete,
        'precio_paquete' => $faker->randomElement($array = array(500000, 700000,750000,600000,1000000)),
        'destino_paquete' => $destino,
        'fecha_paquete' => $fecha_paquete,
        'id_vuelo' => $vuelo->id,
        'id_hospedaje' => $hospedaje->id,
        'id_habitacion' => $habitacion->id,
        'id_transporte' => $transporte->id
    ];
});
