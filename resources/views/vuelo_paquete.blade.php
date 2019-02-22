@extends('layouts.base')
@section('content')

@if($paquete->tipo_paquete == 'Alojamiento')
<form action="/Hospedaje/obtenerAlojamientoPaquete/{{$paquete->id}}" method="get">
@elseif($paquete->tipo_paquete == 'Automóvil')
<form action="/Transporte/obtenerAutosPaquete/{{$paquete->id}}" method="get">
@endif
<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
        <div class="card-header">{{ __('Selección de vuelo') }}</div>
          <div class="card-body">
            <div class="row justify-content-start">
              <div class="col-4">
                <label for="ciudadOrigen" style="margin-left: 15%" class="col-form-label">{{ __('Ciudad Origen') }}</label>   
              </div>
              <div class="col-4">
                <label for="ciudadDestino" style="margin-left: 15%" class="col-form-label">{{ __('Ciudad Destino') }}</label>
              </div>
            </div>                
            <div class="row justify-content-start">
              <div class="col-4"> 
                <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_origen_vuelo" name="ciudad_origen_vuelo" >
                  <option selected disable>Ciudad Origen</option>                          
                  @foreach ($vuelos as $vuelo)
                  <option value="{{ $vuelo->origen_vuelo }}">
                    {{$vuelo->origen_vuelo}}
                  </option>
                  @endforeach 
                </select>
              </div>
              <div class="col-4"> 
                <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_destino_vuelo" name="ciudad_destino_vuelo">
                  <option selected disable>{{$paquete->destino_paquete}}</option> 
                </select>
              </div>
            </div>
            <div class="row justify-content-start">
              <div class="col-4">
                <label for="fechaVuelo" style="margin-left: 15%" class="col-form-label">{{ __('Fecha de Viaje') }}</label>   
              </div>
              <div class="col-4">
                <label for="numPasajeros" style="margin-left: 15%" class="col-form-label">{{ __('Número de Pasajeros') }}</label>
              </div>
            </div>
            <div class="row justify-content-start">
              <div class="col-4">
                <input id="fecha_ida" style="margin-left: 15%" type="text" class="form-control{{ $errors->has('fecha_viaje') ? ' is-invalid' : '' }}" id="fecha_viaje" name="fecha_viaje" value="{{$paquete->fecha_paquete}}" disabled>
                    @if ($errors->has('fecha_viaje'))
                    <span class="invalid-feedback" role="alert"></span>
                    @endif
              </div>
              <div class="col-4"> 
                <select style="margin-left: 15%" class="form-control selectpicker custom-select" name="num_pasajeros">
                  <option selected disable>Número de pasajeros</option>
                  <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                  <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                  <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                </select>
              </div>
            </div>
            @if ($paquete->tipo_paquete == 'Alojamiento')
            <div class="form-group row mb-0" style="margin-top: 10%;">
              <div class="col-md-6 offset-md-4">
                <center>
                <button type="submit" class="btn btn-get-started">Buscar alojamiento</button>
                </center>
              </div>
              </div>
              @elseif ($paquete->tipo_paquete == 'Automóvil')
              <div class="form-group row mb-0" style="margin-top: 10%;">
                <div class="col-md-6 offset-md-4">
                  <center>
                  <button type="submit" class="btn btn-get-started">Buscar automóvil</button>
                  </center>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
@endsection

