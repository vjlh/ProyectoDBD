@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/Asiento" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($vuelos as $vuelo)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="/images/hotel.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Origen: {{$vuelo->origen_vuelo}}</h5>
                <h5 class="card-title">Destino: {{$vuelo->destino_vuelo}}</h5>
                <p class="card-text">
                
                    <p>fecha: {{$vuelo->fecha_vuelo}}</p>
                    <p>hora despegue: {{$vuelo->hora_vuelo}}</p>
                    <p>duración vuelo: {{$vuelo->duracion_vuelo}}</p>
                    
                </p>
            <a class="btn btn-primary">Reservar</a>
        </div>
    </div>          
@endforeach
</div>

</form>
@endsection