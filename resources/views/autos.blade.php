@extends('layouts.base')
@section('content')



<section id="intro">
    <style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
    <section id="about" >
        <div class="container" style="margin-top: 10%;">
            <div class="row about-cols">
            @foreach ($transportes as $transporte)    
                
                <div class="col-md-4 wow ">
                    <div class="about-col">
                        <div class="img">
                            <img src="{{asset('assets/img/auto.jpg')}}" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-android-car"></i></div>
                        </div>
                        <form action="/Transporte_Reserva/{{$transporte->id}}/" method="PATCH">
                            <h2 class="title"><a>Modelo: {{$transporte->modelo_transporte}}</a></h2>
                            <center><h6 class="subtitle"><a>Puntuación: {{$transporte->puntuacion_transporte}}</a></h6></center>
                            <p>Precio: {{$transporte->precio}}</p>
                            <p>Patente: {{$transporte->patente_transporte}}</p>
                            <p>Número de puertas: {{$transporte->num_puertas_transporte}}</p>
                            <p>Número de asientos: {{$transporte->num_asientos_transporte}}</p>
                            @if($transporte->aire_acondicionado_transporte == 0)
                                <p>Aire acondicionado: No </p>
                            @endif
                            @if($transporte->aire_acondicionado_transporte == 1)
                                <p>Aire acondicionado: Sí </p>
                            @endif
                    
                            @guest
                                <!-- Trigger the modal with a button -->
                                <center>
                                    <button type="button" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Reservar</button>
                                </center>
                            

                                @else

                                <center>
                                    <button type="submit" class="btn btn-get-started scrollto">Reservar</button>
                                </center>
                            @endguest
                        </form>  
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
</section>

@endsection