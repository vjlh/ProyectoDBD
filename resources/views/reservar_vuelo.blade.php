@extends('layouts.base')
@section('content')


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/Vuelo" method="get">
        
       
       
<div class="content" style="padding: 50px;">
<div class="flex-center position-ref" style="margin: 15%;">
<div class="card card_compra text-white bg-primary mb-3 border-success" style="top: -155px; background-color: #2c3e50d9 !important;">
  <h1><div class="card-header text-left">Reservación</div></h1>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <div class="form-group">
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
        <label for="nombre_pasajero" style="margin-right: 103px; margin-left: -75px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Nombre*') }}</label><label for="apellido_pasajero" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Apellido*') }}</label>
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

            <button type="submit" style="font-size: 2.0rem; margin-left: 150%;margin-top: -15%;width: 300px;height: 150px;margin-left: 104%;margin-top: -49%;" class="btn btn-success">Busca tu vuelo</button>
        </div>
    </div>

  </div>
</div>
</div>
</div>
</div>

</form>

@endsection