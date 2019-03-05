<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva de Automóvil</title>
</head>
<body>

    <h2>{{$e_encab}} </h2>
    <h4>Detalles de la reserva</h4>
    <ul>
        <li>Fecha de inicio: {{$e_inicio}} </li>
        <li>Fecha de fin: {{$e_fin}} </li>
    </ul>

    <h4>Detalles del vehiculo</h4>
    <ul>
        <li>Modelo de Autómovil: {{$e_model}}</li>
        <li>Patente de Autómovil: {{$e_patent}}</li>
        <li>Puntuación del Autómovil: {{$e_puntua}}</li>
        <li>Número de Asientos: {{$e_asien}}</li>
        <li>Número de Puertas: {{$e_puert}}</li>
        <li>Aire Acondicionado: {{$e_air}}</li>
    </ul>

    <h3>Valor de la reserva: ${{$e_costo}}</h3>
    
</body>
</html>