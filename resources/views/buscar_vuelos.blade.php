@extends('layouts.base')
@section('content')



<form action="/Vuelo" method="get">

<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Buscando Vuelo') }}</div>

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
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_origen" name="ciudad_origen">
                          <option selected disable>Ciudad Origen</option>
                          @foreach ($ciudades as $ciudad)
                          <option value="{{ $ciudad->nombre_ciudad }}">
                              {{$ciudad->nombre_ciudad}}
                          </option>
                          @endforeach 
                      </select>
                    </div>


                    <div class="col-4"> 
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_destino" name="ciudad_destino">
                          <option selected disable>Ciudad Destino</option>
                          @foreach ($ciudades as $ciudad)
                          <option value="{{ $ciudad->nombre_ciudad }}">
                              {{$ciudad->nombre_ciudad}}
                          </option>
                          @endforeach 
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
                        <input id="fecha_ida" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_viaje') ? ' is-invalid' : '' }}" name="fecha_viaje" value="{{ old('fecha_viaje') }}">
                            @if ($errors->has('fecha_viaje'))
                            <span class="invalid-feedback" role="alert"></span>
                            @endif
                    </div>
                    <div class="col-4"> 
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="num_pasajeros" name="num_pasajeros">
                          <option selected disable>Número de pasajeros</option>
                          <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                          <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                          <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                      </select>
                    </div>
                  </div>

                        <div class="form-group row mb-0" style="margin-top: 10%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-get-started scrollto">
                                    {{ __('Buscar Vuelo!') }}
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

