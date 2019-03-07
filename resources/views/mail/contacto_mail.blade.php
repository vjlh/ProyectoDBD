<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widli=device-widli, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <h2>Contacto a aerolinea g8</h2>
        <h3>Se ha enviado un correo de contacto a aerolinea g8 con el siguiente mensaje</h3>
        <ul>
            <p style="font-size:200%">" {{$datos->message}} "</p>
        </ul>      

        <h3>Los datos de contacto de la persona son los siguientes: </h3>
        <ul>
            <li style="font-size:140%">Nombre: {{$datos->name}}</li>
            <li style="font-size:140%">Correo: {{$datos->email}}</li>
        <ul>
    </body>
</html>



