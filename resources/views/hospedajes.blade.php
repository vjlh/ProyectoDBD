@extends('layouts.base')
@section('content')




<form action="/Habitacion" method="get">
<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
<section id="about" >
<div class="container" style="margin-top: 10%;">
<div class="row about-cols">
@foreach ($hospedajes as $hospedaje)


<div class="col-md-4 wow ">
            <div class="about-col">
              <div class="img">
              <img src="{{asset('assets/img/hyatt.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-home"></i></div>
              </div>
              <h2 class="title"><a>{{$hospedaje->nombre_hospedaje}}</a></h2>
              <center><h6 class="subtitle"><a>{{$hospedaje->ubicacion}}</a></h6></center>
              <p>Estrellas: {{$hospedaje->estrellas_hospedaje}}</p>
                @if($hospedaje->estacionamiento_hospedaje == 0)
                    <p>Estacionamiento: No </p>
                @endif
                @if($hospedaje->estacionamiento_hospedaje == 1)
                    <p>Estacionamiento: Sí </p>
                @endif
                @if($hospedaje->piscina_hospedaje == 0)
                    <p>Piscina: No </p>
                @endif
                @if($hospedaje->piscina_hospedaje== 1)
                    <p>Piscina: Sí </p>
                @endif
                <p>Habitaciones disponibles: {{$hospedaje->cantidad_disponible}}</p>
                <center>
                <a href="/Habitacion/{{$hospedaje->id}}" class="btn btn-get-started scrollto">Ver Habitaciones</a>
                </center>
            </div>
          </div>


        
@endforeach
</div>
</div>
</section><!-- #about -->
</section>





</form>

@endsection


