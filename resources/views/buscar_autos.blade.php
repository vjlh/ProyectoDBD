@extends('layouts.app')
@section('content')
@include('includes.carousel')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/seleccionar_auto" method="get">

<div class="content" style="padding: 50px;">
  <div class="flex-center position-ref">
    <div class="card card_compra text-white bg-primary mb-3 border-success" style="top: -155px;
    overflow:auto; background-color: #2c3e50d9 !important;">
      <h2><div class="card-header">Reserva tu vehículo</div></h2>
      <div class="card-body">
        <h4 class="card-title"></h4>
        <div class="form-group">
          <div class="form-group row">
            <label for="city_origen" style="margin-right: 103px; margin-left: -40px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Ciudad de origen') }}</label><label for="city_destino" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Ciudad de entrega') }}</label>
          </div>
          
          <span>
            <select class="form-control selectpicker custom-select" id="ciudad_origen" name="ciudad_origen" #inputOrigen>
              <option selected disable>Ciudad de origen</option>
              @foreach ($ciudades as $ciudad)
              <option value="{{ $ciudad->nombre_ciudad }}">
                {{$ciudad->nombre_ciudad}}
              </option>
              @endforeach
            </select>
          </span>
          <span>
            <select class="form-control selectpicker custom-select" id="ciudad_destino" name="ciudad_destino" #inputEntrega>
              <option selected disable>Ciudad de entrega</option>
              @foreach ($ciudades as $ciudad)
              <option value="{{ $ciudad->nombre_ciudad }}">
                {{$ciudad->nombre_ciudad}}
              </option>
              @endforeach
            </select>
          </span>
          
        </div>

        <div class="form-group">
          <div class="form-group row">
            <label for="city_origen" style="margin-right: 103px; margin-left: -40px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Modelo vehículo') }}</label><label for="city_destino" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Número de asientos') }}</label>
          </div>
          
          <span>
            <select class="form-control selectpicker custom-select" id="ciudad_origen" name="ciudad_origen" #inputModelo>
              <option selected disable>Modelo vehículo</option>
              <?php
              $modelos = array();
              foreach($transportes as $transporte)
                $modelos[] = $transporte->modelo_transporte;
              
              $modelos = array_unique($modelos);
              ?>
              @foreach ($modelos as $modelo)
              <option value="{{ $modelo }}">
                {{$modelo}}
              </option>
              @endforeach
            </select>
          </span>
          <span>
            <select class="form-control selectpicker custom-select" id="ciudad_destino" name="ciudad_destino" #inputAsientos>
              <option selected disable>Número de asientos</option>
              <?php
              $asientos = array();
              foreach($transportes as $transporte)
                $asientos[] = $transporte->num_asientos_transporte;
              
              $asientos = array_unique($asientos);
              sort($asientos);
              ?>
              @foreach ($asientos as $asiento)
              <option value="{{ $asiento }}">
                {{$asiento}}
              </option>
              @endforeach
            </select>
          </span>
          
        </div>

        <div class="form-group">
          <div class="form-group row">
            <label for="city_origen" style="margin-right: 103px; margin-left: -40px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Aire acondicionado') }}</label><label for="city_destino" class="col-md-4 col-form-label" style= "padding: 0; margin-top: 20px;">{{ __('Número de puertas') }}</label>
          </div>
          
          <span>
            <select class="form-control selectpicker custom-select" id="ciudad_origen" name="ciudad_origen">
              <option selected disable>Aire acondicionado</option>
              <option value="True">Si</option>
              <option value="False">No</option>
            </select>
          </span>
          <span>
            <select class="form-control selectpicker custom-select" id="ciudad_destino" name="ciudad_destino" #inputPuertas>
              <option selected disable>Número de puertas</option>
              <?php
              $puertas = array();
              foreach($transportes as $transporte)
                $puertas[] = $transporte->num_puertas_transporte;
              
              $puertas = array_unique($puertas);
              sort($puertas);
              ?>
              @foreach ($puertas as $puerta)
              <option value="{{ $puerta }}">
                {{$puerta}}
              </option>
              @endforeach
            </select>
          </span>
          
        </div>

        <div class="form-group">
          <div class="form-group row">
            <label for="fecha_viaje" style="margin-left: -50px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Fecha de Inicio') }}</label><label for="city_destino" class="col-md-4 col-form-label" style= "margin-left: 110px;padding: 0; margin-top: 20px;">{{ __('Fecha de entrega') }}</label>
          </div>
          <div>
          <input id="fecha_viaje" style="margin-left: 15px; max-width: 300px;" type="date" class="form-control{{ $errors->has('fecha_viaje') ? ' is-invalid' : '' }}" name="fecha_viaje" value="{{ old('fecha_viaje') }}" #inputFechaInicio>
            @if ($errors->has('fecha_viaje'))
                <span class="invalid-feedback" role="alert">
                </span>
            @endif
            </div>
            <div>
          <input id="fecha_viaje" style="margin-left: 15px; max-width: 300px;" type="date" class="form-control{{ $errors->has('fecha_viaje') ? ' is-invalid' : '' }}" name="fecha_viaje" value="{{ old('fecha_viaje') }}" #inputFechaFin>
            @if ($errors->has('fecha_viaje'))
                <span class="invalid-feedback" role="alert">
                </span>
            @endif
            </div>
          <div class="col-md-6">
                       
            <button type="submit" style="margin:auto;font-size: 1.0rem; width: 300px;height: calc(2.15625rem + 2px);margin-left: 104%;margin-top: -18%;" class="btn btn-success">Buscar vehículo</button>
        </div>
          
        </div>
  
        
    </div>

  </div>
</div>
</div>
</div>
</div>

</form>

@endsection