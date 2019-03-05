<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widli=device-widli, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reserva de Seguro</title>
    </head>
    <body>
        <h2>{{$e_encab}} </h2>
        <h4>Detalles del seguro reservado </h4>
        <ul>
            <li>Fecha inicio: {{$e_inicio}}</li>
            <li>Fecha termino: {{$e_fin}}</li>
            <li>Destino del seguro: {{$e_seguro->destino_seguro}}</li>
            <li>Tipo de seguro: {{$e_seguro->tipo_seguro}}</li>
            <li>Numero de personas que cubre el seguro: {{$e_seguro->numero_pasajeros_seguro}}</li>
            <li>Numero de días: {{$e_dias}}</li>
           
        </ul>      
        <h4>Beneficios que incluye seguro contratado</h4>
        <ul>
            @foreach ($e_beneficios as $beneficios)
                <li>{{$beneficios->nombre_beneficio}}</li>
            @endforeach
        </ul>

        <h3>Costo total del seguro: ${{$e_seguro->precio_seguro}}</h3>
        
    </body>
</html>