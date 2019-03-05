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
    <p>Fecha de inicio de la reserva: {{$e_inicio}} </p>
    <p>Fecha de fin de la reserva: {{$e_fin}} </p>
    <p>Número de días reservados: {{$e_dias}}</p>
    <p>Nombre del Hotel: {{$e_nom_hot}}</p>
    <h3>Caracteristicas de la habitacion reservada</h3>
    <p>Tipo: {{$e_tip_hab}}</p>
    <p>Capacidad: {{$e_capa_hab}}</p>
    <p>Baño privado: {{$e_ban_pr}}</p>
    <p>Aire Acondicionado: {{$e_air}}</p>

    <p>VALOR TOTAL DE LA RESERVA: ${{$e_costo}}</p>
    
</body>
</html>