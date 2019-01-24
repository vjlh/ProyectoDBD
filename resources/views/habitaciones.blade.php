@extends('layouts.app')
@section('content')
@include('includes.carousel')
<form action="/Habitacion" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($habitaciones as $habitacion)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="http://coperama.es/blog/wp-content/uploads/2015/02/habitacion-triple-hotel-arana-bilbao.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Clase: {{$habitacion->tipo}}</h5>
            <p class="card-text">
                <p>Capacidad: {{$habitacion->capacidad_habitacion}}</p>
                <p>Baño Privado: {{$habitacion->banio_privado}}</p>
                <p>Aire Acondicionado: {{$habitacion->aire_acondicionado_habitacion}}</p>
            </p>
            <a href="/Habitacion/{{$habitacion->id}}" class="btn btn-primary">Reservar</a>
        </div>
    </div>          
@endforeach
</div>

</form>
@endsection