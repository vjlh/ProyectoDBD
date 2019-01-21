
@extends('layouts.app')
@section('content')
@include('includes.carousel')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
       
       
<div class="content" style="padding: 50px;">
<div class="flex-center position-ref">
<div class="card card_compra text-white bg-primary mb-3 border-success" style="top: -155px; background-color: #2c3e50d9 !important;">
  <h1><div class="card-header">Reserva tu vuelo!</div></h1>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <div class="form-group">
    
    <div class="form-group row">
        <label for="city_origen" style="margin-right: 103px; margin-left: -75px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Origen') }}</label><label for="city_destino" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Destino') }}</label>
      </div>
    <select class="custom-select">
      <option selected="">Ciudad Origen</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>

    
    <select class="custom-select">
    <option selected="">Ciudad Destino</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>

  <div class="form-group">
  <div class="form-group row">
        <label for="numero_pasajeros" style="margin-left: -27px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Número de Pasajeros') }}</label>
      </div>
    <select class="custom-select" style="margin-right: 423px">
      <option selected="">Número de Pasajeros</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
    </select>
  </div>
  
      <div class="form-group row">
        <label for="fecha_viaje" style="margin-left: -50px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Fecha de Viaje') }}</label>
      </div>
        <div class="col-md-6">
            
            <input id="fecha_viaje" style="max-width: 300px;" type="date" class="form-control{{ $errors->has('fecha_viaje') ? ' is-invalid' : '' }}" name="fecha_viaje" value="{{ old('fecha_viaje') }}">
            @if ($errors->has('fecha_viaje'))
                <span class="invalid-feedback" role="alert">
                </span>
            @endif

            <button type="button" style="font-size: 2.0rem; margin-left: 150%;margin-top: -15%;width: 300px;height: 150px;margin-left: 104%;margin-top: -49%;" class="btn btn-success">Busca tu vuelo</button>

        </div>
    </div>

  </div>
</div>
</div>
</div>
</div>

<div class="content">
  <div class="flex-center position-ref">
            
<div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-right: 30px; margin-top: 30px;">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Seguros</h4>
    <a title="img_seguro" href="/seguros">
    <img src="/images/seguro.jpg" alt="img_seguro" style="height: 155px; width: 280px">
    </a>
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