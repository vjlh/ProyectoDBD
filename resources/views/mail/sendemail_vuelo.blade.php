<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widli=device-widli, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reserva de Vuelo</title>
    </head>
    <body>
        <h2>{{$e_encab}} </h2>
        <h4>Detalle del vuelo</h4>
        <ul>
            <li>Origen: {{$e_origen}}</li>
            <li>Destino: {{$e_destino}}</li>
        
            <li>Fecha: {{$e_fecha}}</li>
            <li>Hora: {{$e_hora}}</li>
        </ul>      
        <h4>Asientos reservados</h4>
        <ul>
            @foreach ($e_asientos as $asiento)
                <li>Asiento: {{$asiento->letra_asiento}} {{$asiento->numero_asiento}}</li>
                <li>Cabina: {{$asiento->cabina}}</li> 
                <li>Precio: {{$asiento->precio_asiento}}</li> 
                <br> 
            @endforeach
        </ul>
        <h3>Costo total: ${{$e_costo}}</h3>
        <br>
        <h2>Código para hacer Check-In</h2>
        <h1>{{$e_cod}}</h1>
        <br>
        <p>Recuerde hacer su Check-In como máximo dos días antes de su vuelo</p>


    </body>

</html>