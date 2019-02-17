@extends('layouts.base')
@section('content')

<!--==========================
    Intro Section
  ============================-->
<form action="/Hospedaje" method="get">
<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Buscando Hospedaje') }}</div>

                <div class="card-body">


                <div class="row justify-content-start">
                    <div class="col-4">
                    <label for="ciudad_origen" style="margin-left: 15%" class="col-form-label">{{ __('Lugar') }}</label>   
                    </div>
                    <div class="col-4">
                    <label for="numero_personas" style="margin-left: 15%" class="col-form-label">{{ __('Numero de personas') }}</label>
                    </div>
                </div>


                <div class="row justify-content-start">
                    <div class="col-4"> 
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_origen" name="ciudad_origen">
                          <option selected disable>Lugar de Hospedaje</option>
                          @foreach ($ciudades as $ciudad)
                          <option value="{{ $ciudad->nombre_ciudad }}">
                              {{$ciudad->nombre_ciudad}}
                          </option>
                          @endforeach 
                      </select>
                    </div>

                      <div class="col-4">
                          <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="numero_personas" name="numero_personas">
                              <option selected="">Cantidad de personas</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                          </select>
                      </div>
                  </div>


                  <div class="row justify-content-start">
                    <div class="col-4">
                      <label for="numero_personas" style="margin-top: 10%; margin-left: 15%;" class="col-form-label">{{ __('Fecha de inicio') }}</label>
                    </div>
                    <div class="col-4">
                      <label for="fecha_viaje" style="margin-top: 10%; margin-left: 15%;" class="col-form-label">{{ __('Fecha de termino') }}</label>
                    </div>
                  </div>

                  
                  <div class="row justify-content-start">
                    <div class="col-4">
                        <input id="fecha_ida" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_ida') ? ' is-invalid' : '' }}" name="fecha_ida" value="{{ old('fecha_ida') }}">
                            @if ($errors->has('fecha_ida'))
                            <span class="invalid-feedback" role="alert"></span>
                            @endif
                    </div>
                    <div class="col-4">
                        <input id="fecha_vuelta" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_vuelta') ? ' is-invalid' : '' }}" name="fecha_vuelta" value="{{ old('fecha_vuelta') }}">
                                @if ($errors->has('fecha_vuelta'))
                                <span class="invalid-feedback" role="alert"></span>
                                @endif
                      </div>          
                  </div>

                        <div class="form-group row mb-0" style="margin-top: 10%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-get-started scrollto">
                                    {{ __('Buscar Hotel!') }}
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