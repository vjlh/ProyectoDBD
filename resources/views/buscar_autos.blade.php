@extends('layouts.base')
@section('content')



<form action="/autos" method="get">

<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Buscando Automóvil') }}</div>

                <div class="card-body">


                <div class="row justify-content-start">
                    <div class="col-4">
                    <label for="ciudad_origen" style="margin-left: 15%" class="col-form-label">{{ __('Ciudad Inicio') }}</label>   
                    </div>
                    <div class="col-4">
                    <label for="numero_personas" style="margin-left: 15%" class="col-form-label">{{ __('Número de asientos') }}</label>
                    </div>
                </div>


                <div class="row justify-content-start">
                    <div class="col-4"> 
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_inicio" name="ciudad_inicio">
                          <option selected disable>Ciudad Inicio</option>
                          @foreach ($ciudades as $ciudad)
                          <option value="{{ $ciudad->nombre_ciudad }}">
                              {{$ciudad->nombre_ciudad}}
                          </option>
                          @endforeach 
                      </select>
                    </div>

                    <div class="col-4"> 
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="num_asientos_transporte" name="num_asientos_transporte">
                          <option selected disable>Número de asientos</option>
                          <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                          <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                          <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                      </select>
                    </div>
                  </div>

                  <div class="row justify-content-start">
                    <div class="col-4">
                    <label for="ciudad_origen" style="margin-left: 15%" class="col-form-label">{{ __('Fecha Inicio') }}</label>   
                    </div>
                    <div class="col-4">
                    <label for="numero_personas" style="margin-left: 15%" class="col-form-label">{{ __('Fecha Fin') }}</label>
                    </div>
                </div>
                  
                  <div class="row justify-content-start">
                    <div class="col-4">
                        <input id="fecha_ida" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
                            @if ($errors->has('fecha_inicio'))
                            <span class="invalid-feedback" role="alert"></span>
                            @endif
                    </div>
                    <div class="col-4">
                        <input id="fecha_vuelta" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" name="fecha_fin" value="{{ old('fecha_fin') }}">
                                @if ($errors->has('fecha_fin'))
                                <span class="invalid-feedback" role="alert"></span>
                                @endif
                      </div>          
                  </div>

                        <div class="form-group row mb-0" style="margin-top: 10%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-get-started scrollto">
                                    {{ __('Buscar Automóvil!!') }}
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>

@endsection