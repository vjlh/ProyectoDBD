<!DOCTYPE html>

<?php
    use Carbon\Carbon;
    use App\Vuelo;
    use App\Asiento;
    use App\Asiento_Vuelo;
    use App\Pasajero;
    setlocale(LC_TIME, 'es_ES.UTF-8'); 
    Carbon::setLocale('es'); 
    $fecha_partida = Carbon::parse($vuelo->fecha_vuelo)->formatLocalized('%d %B %Y');
    $hora = Carbon::parse($vuelo->hora_vuelo)->format('H:i');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva de Habitacion</title>
</head>
<body>

    <h2>{{$encabezado}} </h2>
    <h4>Detalles del vuelo </h4>
    <ul>
        <li>Fecha: {{$fecha_partida}} </li>
        <li>Hora: {{$hora}}</li>
        <li>Origen:{{$vuelo->origen_vuelo}} </li>
        <li>Destino:{{$vuelo->destino_vuelo}} </li>
    </ul>

    <h4>Asientos reservados</h4>
    <ul>
        @foreach ($asientos as $asiento)
            <li>Asiento: {{$asiento->letra_asiento}} {{$asiento->numero_asiento}}</li>
            <li>Cabina: {{$asiento->cabina}}</li> 
            <br> 
        @endforeach
    </ul>
    <h4>Pasajeros ingresados</h4>
    <ul>
        @foreach ($pasajeros as $pasajero)
            <li>Nombre: {{$pasajero->nombre_pasajero}} {{$pasajero->apellido_pasajero}}</li>
            <li>Rut: {{$pasajero->rut_pasajero}}</li> 
            <li>Edad: {{$pasajero->edad_pasajero}}</li> 
            <li>Tipo: {{$pasajero->tipo_pasajero}}</li> 
            <li>Pais: {{$pasajero->pais_pasajero}}</li> 
            <li>Correo: {{$pasajero->correo_pasajero}}</li> 
            <br> 
        @endforeach
    </ul>
</body>
</html>