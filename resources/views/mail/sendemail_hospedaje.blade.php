<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva de Habitacion</title>
</head>
<body>

    <h2>{{$e_encab}} </h2>
    <h4>Detalles de la reserva </h4>
    <ul>
        <li>Fecha de inicio de la reserva: {{$e_inicio}} </li>
        <li>Fecha de fin de la reserva: {{$e_fin}} </li>
        <li>Número de días reservados: {{$e_dias}}</li>
    </ul>

    <h4>Detalles del hotel </h4>
    <ul>
        <li>Ubicacion: {{$e_hotel->ubicacion}}</li>
        <li>Nombre: {{$e_hotel->nombre_hospedaje}}</li>
        <li>Cadena: {{$e_hotel->cadena_hospedaje}}</li>
        <li>Numero de estrellas: {{$e_hotel->estrellas_hospedaje}}</li>
    </ul>

    <h4>Caracteristicas de la habitacion reservada</h4>
    <ul>
        <li>Tipo: {{$e_habi->tipo}}</li>
        <li>Capacidad: {{$e_habi->capacidad}}</li>
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

    <h3>Valor total de la reserva: ${{$e_costo}}</h3>
    
</body>
</html>