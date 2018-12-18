
@extends('layouts.app')
@section('content')
@include('includes.carousel')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
       
       
          <div class="content">
       
        <div class="flex-center position-ref">
            
<div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-right: 30px; margin-top: 30px;">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Seguros</h4>
    <img src="/images/seguro.jpg" alt="" style="height: 155px; width: 280px">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-right: 30px; margin-top: 30px;">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Paquetes</h4>
    <img src="/images/paquetes.jpg" alt="" style="height: 155px; width: 280px">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-right: 30px; margin-top: 30px;">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Promociones</h4>
    <img src="/images/promociones.jpg" alt="" style="height: 155px; width: 280px">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

            </div>

<div class="flex-center position-ref">

<div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-right: 30px; margin-top: 30px;">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Hoteles</h4>
    <img src="/images/hoteles.jpg" alt="" style="height: 155px; width: 280px">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-right: 30px; margin-top: 30px;">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Autos</h4>
    <img src="/images/car.jpg" alt="" style="height: 155px; width: 280px">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-right: 30px; margin-top: 30px;">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Destinos</h4>
    <img src="/images/avioncito.jpg" alt="" style="height: 155px; width: 280px">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

        </div>

        @endsection