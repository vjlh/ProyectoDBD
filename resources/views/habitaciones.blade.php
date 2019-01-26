@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="form-group row" style="margin-left:50px">
    @foreach ($habitaciones as $habitacion)
    <form action="/Habitacion_Reserva/{{$habitacion->id}}/" method="PATCH">
        <div class="card mb-3 border-dark mb-3" style="width: 18rem;margin-top:10px;margin-left:20px">
            <img class="card-img-top" src="/images/habitacion.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Clase: {{$habitacion->tipo}}</h5>
                <p class="card-text">
                
                    <p>Costo (por dia): {{$habitacion->precio}}</p>
                    <p>Capacidad: {{$habitacion->capacidad_habitacion}}</p>
                    <p>Baño Privado: {{$habitacion->banio_privado}}</p>
                    <p>Aire Acondicionado: {{$habitacion->aire_acondicionado_habitacion}}</p>
                </p>

            @guest
             <!-- Trigger the modal with a button -->
             <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Reservar</button>
           
            @include('includes.registrarse')

            @else

            <button type="submit" class="btn btn-primary">Reservar</button>
            
            @endguest  
            </div>
        </div>
    </form>          
    @endforeach
</div>

@endsection