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
    /*
    //se obtiene el vuelo de ida
    $vuelosUbicacion = Vuelo::All()->where('destino_vuelo', '=', $destino)
                                   ->where('fecha_vuelo','=', $fecha_paquete);
    $vuelos_id = [];
    foreach ($vuelosUbicacion as $vuelo) {
        array_push($vuelos_id,$vuelo->id);
    }
    $vuelo_ida = Vuelo::find($vuelos_id[0]);

    $vuelosUbicacion = Vuelo::All()->where('origen_vuelo','=',$destino)
                                   ->where('destino_vuelo','=',$vuelo_ida->origen_vuelo);
    $vuelos_id = [];
    foreach($vuelosUbicacion as $vuelo){
        array_push($vuelos_id,$vuelo->id);
    }
    $vuelo_vuelta = Vuelo::find($vuelos_id[0]);


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
    */
    $id_vuelo_ida = DB::table('vuelos')->select('id')->get()->random()->id;
    $id_vuelo_vuelta = DB::table('vuelos')->select('id')->get()->random()->id;

    $id_hospedaje = NULL;
    $id_habitacion = NULL;
    $id_transporte = NULL;
    if($tipo_paquete == 'Alojamiento'){
        $id_hospedaje = DB::table('hospedajes')->select('id')->get()->random()->id;
        $id_habitacion = DB::table('habitaciones')->select('id')->get()->random()->id;
    }
    elseif($tipo_paquete == 'Automóvil'){
        $id_transporte = DB::table('transportes')->select('id')->get()->random()->id;
    }
    elseif($tipo_paquete == 'All'){
        $id_hospedaje = DB::table('hospedajes')->select('id')->get()->random()->id;
        $id_habitacion = DB::table('habitaciones')->select('id')->get()->random()->id;
        $id_transporte = DB::table('transportes')->select('id')->get()->random()->id;
    }

    return [
        'num_dias' => $dias,
        'num_noches' => $noches,
        'tipo_paquete' => $tipo_paquete,
        'precio_paquete' => $faker->randomElement($array = array(500000, 700000,750000,600000,1000000)),
        'destino_paquete' => $destino,
        'fecha_paquete' => $fecha_paquete,
        'id_vuelo_ida' => $id_vuelo_ida,
        'id_vuelo_vuelta' => $id_vuelo_vuelta,
        'id_hospedaje' => $id_hospedaje,
        'id_habitacion' => $id_habitacion,
        'id_transporte' => $id_transporte
    ];
});
