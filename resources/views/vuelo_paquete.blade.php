@extends('layouts.base')
@section('content')



<form action="/Asiento" method="get">

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
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_origen" onchange="selectOrigen()" name="ciudad_origen">
                          <option selected disable>Ciudad Origen</option>
                          
                          @foreach ($vuelos as $vuelo)
                          <option value="{{ $vuelo->origen_vuelo }}">
                              {{$vuelo->origen_vuelo}}
                          </option>
                          @endforeach 
                      </select>
                    </div>
                    <div class="col-4"> 
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_destino" name="ciudad_destino">
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
                        <input id="fecha_ida" style="margin-left: 15%" type="text" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" name="fecha_inicio" value="{{$paquete->fecha_paquete}}" disabled>
                            @if ($errors->has('fecha_inicio'))
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
                                <center>
                                <input type="hidden" value="{{$vuelo->aviones->id}}" name="avioncito_id" id="avioncito_id">
                                <button type="submit" class="btn btn-get-started">Ver Asientos</button>
                                </center>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>

@endsection

