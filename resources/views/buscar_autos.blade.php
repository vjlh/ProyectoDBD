@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/seleccionar_autos" method="get">

<div class="content" style="padding: 50px;">
  <div class="flex-center position-ref">
    <div class="card card_compra text-white bg-primary mb-3 border-success" style="overflow: auto;top: -155px; background-color: #2c3e50d9 !important;">
  <h1><div class="card-header"> <i class="fas fa-plane-departure"></i> Reserva tu vehículo</div></h1>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <div class="form-group">
    
    <div class="form-group row">
        <label for="ciudad_inicio" style="margin-right: 103px; margin-left: -75px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Ciudad Inicio') }}</label><label for="ciudad_entrega" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Ciudad Entrega') }}</label>
      </div>
    <span><select class="form-control selectpicker custom-select" id="ciudad_inicio" name="ciudad_inicio">
      <option selected disable>Ciudad Inicio</option>
      @foreach ($ciudades as $ciudad)
      <option value="{{ $ciudad->nombre_ciudad }}">
        {{$ciudad->nombre_ciudad}}
      </option>
      @endforeach
    </select></span>

    
    <span><select class="form-control selectpicker custom-select" id="ciudad_entrega" name="ciudad_entrega">
      <option selected disable>Ciudad Entrega</option>
      @foreach ($ciudades as $ciudad)
      <option value="{{ $ciudad->nombre_ciudad }}">
        {{$ciudad->nombre_ciudad}}
      </option>
      @endforeach
    </select></span>

  </div>

  <div class="form-group">
    
    <div class="form-group row">
        <label for="modelo_transporte" style="margin-right: 103px; margin-left: -75px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Modelo Transporte') }}</label><label for="num_asientos_transporte" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Asientos') }}</label>
      </div>
    <span><select class="form-control selectpicker custom-select" id="modelo_transporte" name="modelo_transporte">
      <option selected disable>Modelo Transporte</option>
      @foreach ($transportes as $transporte)
      <option value="{{ $transporte->modelo_transporte }}">
        {{$transporte->modelo_transporte}}
      </option>
      @endforeach
    </select></span>

    
    <span><select class="form-control selectpicker custom-select" id="num_asientos_transporte" name="num_asientos_transporte">
      <option selected disable>Asientos</option>
      <option value="1">1</option><option value="2">2</option><option value="3">3</option>
      <option value="4">4</option><option value="5">5</option><option value="6">6</option>
      <option value="7">7</option><option value="8">8</option><option value="9">9</option>
    </select></span>

  </div>

  <div class="form-group">
    
    <div class="form-group row">
        <label for="aire_acondicionado_transporte" style="margin-right: 103px; margin-left: -75px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Aire acondicionado') }}</label><label for="num_puertas_transporte" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Puertas') }}</label>
      </div>
    <span><select class="form-control selectpicker custom-select" id="aire_acondicionado_transporte" name="aire_acondicionado_transporte">
      <option selected disable>Aire acondicionado</option>
      <option value="1">Si</option>
      <option value="0">No</option>
    </select></span>

    
    <span><select class="form-control selectpicker custom-select" id="num_puertas_transporte" name="num_puertas_transporte">
      <option selected disable>Puertas</option>
      <option value="1">1</option><option value="2">2</option><option value="3">3</option>
      <option value="4">4</option><option value="5">5</option><option value="6">6</option>
      <option value="7">7</option><option value="8">8</option><option value="9">9</option>
    </select></span>

  </div>

      <div class="form-group row">
        <label for="fecha_inicio" style="margin-left: -50px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Fecha de Inicio') }}</label>
      </div>
        <div class="col-md-6">
            
            <input id="fecha_inicio" style="max-width: 300px;" type="date" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
            @if ($errors->has('fecha_inicio'))
                <span class="invalid-feedback" role="alert">
                </span>
            @endif

             <div class="form-group row">
        <label for="fecha_fin" style="margin-left: -50px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Fecha de Fin') }}</label>
      </div>
        <div class="col-md-6">
            
            <input id="fecha_fin" style="max-width: 300px;" type="date" class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" name="fecha_fin" value="{{ old('fecha_fin') }}">
            @if ($errors->has('fecha_fin'))
                <span class="invalid-feedback" role="alert">
                </span>
            @endif

        </div>
            <button type="submit" style="font-size: 1.0rem; margin-left: 150%;margin-top: -15%;width: 300px;height: 40px;margin-left: 104%;margin-top: -49%;" class="btn btn-success">Busca tu vehículo</button>
    </div>

  </div>
</div>
</div>
</div>
</div>

</form>

@endsection