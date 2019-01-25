@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/reservar_auto" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($transportes as $transporte)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="/images/hotel.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Modelo: {{$transporte->modelo_transporte}}</h5>
                <h5 class="card-title">Puntuación: {{$transporte->puntuacion_transporte}}</h5>
                <p class="card-text">
                
                    <p>Patente: {{$transporte->patente_transporte}}</p>
                    <p>Número de puertas: {{$transporte->num_puertas_transporte}}</p>
                    <p>Número de asientos: {{$transporte->num_asientos_transporte}}</p>
                    <p>Aire acondicionado: {{$transporte->aire_acondicionado_transporte}}</p>
                    
                </p>
            <a class="btn btn-primary">Reservar</a>
        </div>
    </div>          
@endforeach
</div>

</form>
@endsection