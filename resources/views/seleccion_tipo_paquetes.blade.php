@extends('layouts.base')
@section('content')



<form action="/paquetes" method="get">

<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Seleccione el tipo de paquete que desea</h3>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('assets/img/hyatt.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-home"></i></div>
              </div>
              <h2 class="title"><a href="/paquetes/Alojamiento">Vuelo + Alojamiento</a></h2>
              <p>
                Aquí puedes encontrar todos los paquetes que involucran el vuelo hacia un maravilloso destino, así como también un excelente alojamiento con las mejores habitaciones para que puedas disfrutar una estadía inolvidable.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('assets/img/auto.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-android-car"></i></div>
              </div>
              <h2 class="title"><a href="/paquetes/Automóvil">Vuelo + Automóvil</a></h2>
              <p>
                Aquí puedes encontrar todos los paquetes que involucran el vuelo hacia un maravilloso destino, así como también un vehículo que te permitirá desplazarte a donde sea que desees ir.
              </p>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>
</form>

@endsection