@extends('layouts.base')
@section('content')



<form action="/paquetes" method="get">

<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
<section id="about" >
<div class="container" style="margin-top: 5%;">

        <header class="section-header">
          <h3 style="color: white;">Seleccione el tipo de paquete que desea</h3>
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
                Aquí puedes encontrar todos los paquetes que involucran el vuelo hacia un maravilloso destino y un excelente alojamiento para que puedas disfrutar una estadía inolvidable.
              </p>
              <center>
              <a href="/paquetes/Alojamiento" class="btn btn-get-started scrollto">Seleccionar</a>
              </center>
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
                Aquí puedes encontrar todos los paquetes que involucran el vuelo hacia un maravilloso destino y también un vehículo que te permitirá desplazarte a donde sea que desees ir.
              </p>
              <center>
              <a  href="/paquetes/Automóvil" class="btn btn-get-started scrollto">Seleccionar</a>
              </center>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('assets/img/auto.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-android-car"></i></div>
              </div>
              <h2 class="title"><a href="/paquetes/All">Vuelo + Alojamiento + Automóvil</a></h2>
              <p>
                Aquí puedes encontrar todos los paquetes que involucran el vuelo hacia un maravilloso destino y también un vehículo que te permitirá desplazarte a donde sea que desees ir.
              </p>
              <center>
              <a  href="/paquetes/All" class="btn btn-get-started scrollto">Seleccionar</a>
              </center>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>
</form>

@endsection