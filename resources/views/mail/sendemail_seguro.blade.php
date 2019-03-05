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
        <ul>
            <li>Tipo de seguro: {{$e_tipo}}</li>
            <li>Numero de personas que cubre el seguro: {{$e_personas}}</li>
        
            <li>Destino del seguro: {{$e_destino}}</li>
            <li>Numero de días: {{$e_dias}}</li>
            <li>Fecha inicio: {{$e_inicio}}</li>
            <li>Fecha termino: {{$e_fin}}</li>
        </ul>      
        <h4>Beneficios del seguro contratado</h4>
        <ul>
            @foreach ($e_beneficios as $beneficios)
                <li>{{$beneficios->nombre_beneficio}}</li>
            @endforeach
        </ul>

        <p>Costo total del seguro: ${{$e_costo}}</p>
        
    </body>
</html>