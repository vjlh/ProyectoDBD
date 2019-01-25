@extends('layouts.app')
@section('content')
@include('includes.carousel')


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/Habitacion" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($hospedajes as $hospedaje)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="/images/hotel.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$hospedaje->nombre_hospedaje}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$hospedaje->ubicacion}}</h6>
            <p class="card-text">
                <p>Estrellas: {{$hospedaje->estrellas_hospedaje}}</p>
                <p>Estacionamiento: {{$hospedaje->estacionamiento_hospedaje}}</p>
                <p>Piscina: {{$hospedaje->piscina_hospedaje}}</p>
                <p>Habitaciones disponibles: {{$hospedaje->cantidad_disponible}}</p>
            </p>
            <a href="/Habitacion/{{$hospedaje->id}}" class="btn btn-primary">Ver Habitaciones</a>
        </div>
    </div>          
@endforeach
</div>

</form>

@endsection