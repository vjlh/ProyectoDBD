@extends('layouts.base')
@section('content')

<!--==========================
    Intro Section
  ============================-->
<form action="/Beneficio/Listado/" method="get">
<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Reserva de Seguro') }}</div>

                    <div class="card-body">

                        <div class="row justify-content-start">
                            <div class="col-4">
                                <label for="destino" style="margin-top: 10%; margin-left: 15%;" class="col-form-label">{{ __('Destino') }}</label>
                            </div>
                            <div class="col-4">
                                <label for="numero_pasajeros" style="margin-top: 10%; margin-left: 40%;" class="col-form-label">{{ __('Numero de Pasajeros') }}</label>
                            </div>
                        </div>


                        <div class="row justify-content-start">
                            <div class="col-4">
                                <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="destino" name="destino" required>
                                    <option value = "" selected="">Destino</option>
                                    <option value = "Africa">Africa</option>
                                    <option value = "Asia">Asia</option>
                                    <option value = "Centroamerica">Centroamerica</option>
                                    <option value = "Europa">Europa</option>
                                    <option value = "Latinoamerica">Latinoamerica</option>
                                    <option value = "Norteamerica">Norteamerica</option>
                                    <option value = "Oceanía">Oceanía</option>
                                </select>
                            </div>  
                            <div class="col-4">

                                <input
                                    style="margin-left: 40%"
                                    id="numero_pasajeros"
                                    name="numero_pasajeros"
                                    type="number"
                                    class="form-control"
                                    value="1"
                                    min="1"
                                    max="10"
                                    required
                                    autofocus
                                >
                            </div>
                        </div>

                        <div class="row justify-content-start">
                    <div class="col-4">
                      <label for="fecha_inicio" style="margin-top: 10%; margin-left: 15%;" class="col-form-label">{{ __('Fecha partida') }}</label>
                    </div>
                    <div class="col-4">
                      <label for="fecha_viaje" style="margin-top: 10%; margin-left: 40%;" class="col-form-label">{{ __('Fecha regreso') }}</label>
                    </div>
                  </div>

                  
                  <div class="row justify-content-start">
                    <div class="col-4">
                        <input id="fecha_ida" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_ida') ? ' is-invalid' : '' }}" name="fecha_ida" value="{{ old('fecha_ida') }}" required>
                            @if ($errors->has('fecha_ida'))
                            <span class="invalid-feedback" role="alert"></span>
                            @endif
                    </div>
                    <div class="col-4">
                        <input id="fecha_vuelta" style="margin-left: 40%" type="date" class="form-control{{ $errors->has('fecha_vuelta') ? ' is-invalid' : '' }}" name="fecha_vuelta" value="{{ old('fecha_vuelta') }}" required>
                                @if ($errors->has('fecha_vuelta'))
                                <span class="invalid-feedback" role="alert"></span>
                                @endif
                      </div>          
                  </div>


                        <div class="form-group row mb-0" style="margin-top: 10%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-get-started scrollto">
                                    {{ __('Explorar Seguros!') }}
                                </button>
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