<!DOCTYPE html>
<?php
    use Carbon\Carbon;
    use App\Vuelo;
    use App\Asiento;
    use App\Asiento_Vuelo;
    use App\Hospedaje;
    use App\Habitacion;
    use App\Transporte;
    use App\Transporte_Reserva;
    use App\Habitacion_Reserva;
    setlocale(LC_TIME, 'es_ES.UTF-8'); 
    Carbon::setLocale('es'); 
    $fecha_partida = Carbon::parse($e_paquete->fecha_paquete)->formatLocalized('%d %B %Y');
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widli=device-widli, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reserva de Vuelo</title>
    </head>
    <body>
        <h2>{{$e_encab}} </h2>
        <h3>Características del paquete</h3>
        <ul>
            <li>Destino: {{$e_paquete->destino_paquete}}</li>
            @if($e_paquete->tipo_paquete == 'Alojamiento')
                <li>Tipo: Vuelo + Hospedaje</li>

            @elseif($e_paquete->tipo_paquete == 'All')
                <li>Tipo: Vuelo + Hospedaje + Transporte</li>
            @else
                <li>Tipo: Vuelo + Transporte</li>
            @endif

            <li>Numero de personas: {{$e_pers}}</li>
            <li>Número de días: {{$e_paquete->num_dias}}</li>
            <li>Número de noches: {{$e_paquete->num_noches}}</li>
            <li>Fecha de partida: {{$fecha_partida}}</li>
            <li>Número de noches: {{$e_paquete->num_noches}}</li>
        </ul>  
        <?php
            $vuelo_ida = Vuelo::find($e_paquete->id_vuelo_ida);
            $fecha_ida = Carbon::parse($vuelo_ida->fecha_vuelo)->formatLocalized('%d %B %Y');
            $hora_ida = Carbon::parse($vuelo_ida->hora_vuelo)->format('H:i');
        ?>
        <br> 
        <h3>Vuelos incluidos en el paquete</h3>
        <h4>Detalles vuelo ida</h4>
        <ul>
            <li>Origen: {{$vuelo_ida->origen_vuelo}}</li>
            <li>Destino: {{$vuelo_ida->destino_vuelo}}</li>
        
            <li>Fecha: {{$fecha_ida}}</li>
            <li>Hora: {{$hora_ida}}</li>
            <li>Asientos:</li>
            <br> 

            <ul>
                @foreach ($e_asientos_ida as $asiento)
                    <li>Asiento: {{$asiento->letra_asiento}} {{$asiento->numero_asiento}}</li>
                    <li>Cabina: {{$asiento->cabina}}</li> 
                    <li>Precio: {{$asiento->precio_asiento}}</li> 
                    <br> 
                @endforeach
            </ul>
        </ul> 
        <h3>Código para hacer Check-In del vuelo de ida</h3>
        <h2>{{$e_check_ida}}</h2>
        <br> 

        <?php
            $vuelo_vuelta = Vuelo::find($e_paquete->id_vuelo_vuelta);
            $fecha_vuelta = Carbon::parse($vuelo_vuelta->fecha_vuelo)->formatLocalized('%d %B %Y');
            $hora_vuelta = Carbon::parse($vuelo_vuelta->hora_vuelo)->format('H:i');
        ?>
        <h4>Detalles vuelo vuelta</h4>
        <ul>
            <li>Origen: {{$vuelo_vuelta->origen_vuelo}}</li>
            <li>Destino: {{$vuelo_vuelta->destino_vuelo}}</li>
        
            <li>Fecha: {{$fecha_vuelta}}</li>
            <li>Hora: {{$hora_vuelta}}</li>
        </ul>
        <ul>
            <li>Origen: {{$vuelo_ida->origen_vuelo}}</li>
            <li>Destino: {{$vuelo_ida->destino_vuelo}}</li>
        
            <li>Fecha: {{$fecha_ida}}</li>
            <li>Hora: {{$hora_ida}}</li>
            <li>Asientos:</li>
            <br> 

            <ul>
                @foreach ($e_asientos_vuelta as $asiento)
                    <li>Asiento: {{$asiento->letra_asiento}} {{$asiento->numero_asiento}}</li>
                    <li>Cabina: {{$asiento->cabina}}</li> 
                    <li>Precio: {{$asiento->precio_asiento}}</li> 
                    <br> 
                @endforeach
            </ul>
        </ul>
        <h3>Código para hacer Check-In del vuelo de regreso</h3>
        <h2>{{$e_check_vuelta}}</h2>
        <br> 

        
        @if($e_paquete->tipo_paquete == 'Alojamiento' || $e_paquete->tipo_paquete == 'All')
        <?php
        $e_hotel = Hospedaje::find($e_paquete->id_hospedaje);
        $e_habi = Habitacion::find($e_paquete->id_habitacion);
        ?>
            <h3>Hospedaje incluido en el paquete</h3>
            <h4>Características del hotel </h4>
            <ul>
                <li>Ubicacion: {{$e_hotel->ubicacion}}</li>
                <li>Nombre: {{$e_hotel->nombre_hospedaje}}</li>
                <li>Cadena: {{$e_hotel->cadena_hospedaje}}</li>
                <li>Numero de estrellas: {{$e_hotel->estrellas_hospedaje}}</li>
            </ul>

            <h4>Características de la habitacion</h4>
            <ul>
                <li>Tipo: {{$e_habi->tipo}}</li>
                <li>Capacidad: {{$e_habi->capacidad_habitacion}}</li>
                @if($e_habi->banio_privado == 1)
                <li>Baño privado: Sí</li>
                @else
                <li>Baño privado: No</li>
                @endif

                @if($e_habi->aire_acondicionado_habitacion == 1)
                <li>Aire Acondicionado: Sí</li>
                @else
                <li>Aire Acondicionado: No</li>
                @endif
            </ul>
            <br> 
        @endif
            
        @if($paquete->tipo_paquete == 'Automóvil' || $e_paquete->tipo_paquete == 'All')
            <?php
                $auto = Transporte::find($e_paquete->id_transporte);
            ?>
            <h3>Transporte incluido en el paquete</h3>
            <h4>Características del vehiculo</h4>
            <ul>
                <li>Modelo de Autómovil: {{$auto->modelo_transporte}}</li>
                <li>Patente de Autómovil: {{$auto->patente_transporte}}</li>
                <li>Puntuación del Autómovil: {{$auto->puntuacion_transporte}}</li>
                <li>Número de Asientos: {{$auto->num_asientos_transporte}}</li>
                <li>Número de Puertas: {{$auto->num_puertas_transporte}}</li>
                @if($auto->aire_acondicionado_transporte == 1)
                <li>Aire Acondicionado: Sí</li>
                @else
                <li>Aire Acondicionado: No</li>
                @endif
            </ul>

        @endif  

        <h3>Costo total: ${{$e_costo}}</h3>
    </body>

</html>