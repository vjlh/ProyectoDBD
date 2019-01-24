@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>


<form action="/Hospedaje" method="get">      
  <div class="content" style="padding: 50px;">
      <div class="flex-center position-ref">
          <div class="card card_compra text-white bg-primary mb-3 border-success" style="top: -155px; background-color: #2c3e50d9 !important;">
              <h1><div class="card-header">Busca tu hotel soñado</div></h1>
              <div class="card-body">

                  <div class="form-group row">
                      <label for="ciudad_origen" style="margin-left: 30px" class="col-form-label">{{ __('Lugar') }}</label>                        
                      <label for="num_habitaciones" style="margin-left: 45px" class="col-md-10 col-form-label">{{ __('Habitaciones') }}</label>
                  </div>
                      
                  <div class="form-group row">
                      <select style="margin-left: 30px" class="form-control selectpicker custom-select" id="ciudad_origen" name="ciudad_origen">
                          <option selected disable>Lugar de Hospedaje</option>
                          @foreach ($ciudades as $ciudad)
                          <option value="{{ $ciudad->nombre_ciudad }}">
                              {{$ciudad->nombre_ciudad}}
                          </option>
                          @endforeach 
                      </select>

                      <div >
                          <select style="margin-left: 45px" class="form-control selectpicker custom-select" id="num_habitaciones" name="num_habitaciones">
                              <option selected="">Cantidad de habitaciones</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                          </select>
                          
                      </div>
                  </div>
                  
                  <div class="form-group row">
                      <label for="numero_personas" style="margin-top: 20px" class="col-md-3 col-form-label">{{ __('Número de Personas') }}</label>
                      <label for="fecha_viaje" style="margin-top: 20px" class="col-md-9 col-form-label">{{ __('Fecha de llegada') }}</label>
                  </div>
                  <div class="form-group row">
                          <select name="numero_personas" style="margin-left: 30px; max-width: 300px" class="custom-select">
                              <option selected="">Cantidad de personas</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                          </select>   
                      <div >           
                          <input id="fecha_viaje" style="width: 300px; margin-left: 45px" type="date" class="form-control{{ $errors->has('fecha_viaje') ? ' is-invalid' : '' }}" name="fecha_viaje" value="{{ old('fecha_viaje') }}">
                              @if ($errors->has('fecha_viaje'))
                              <span class="invalid-feedback" role="alert"></span>
                              @endif
                      </div>          
                  </div>
              
                  <div class="form-group row">
                      <label for="fecha_viaje" style="margin-left: -50px; padding: 0; margin-top: 20px" class="col-md-4 col-form-label">{{ __('Fecha de Viaje') }}</label>
                  </div>
                  <div class="form-group row">
                      <input id="fecha_viaje" style="max-width: 300px;margin-left: 30px" type="date" class="form-control{{ $errors->has('fecha_viaje') ? ' is-invalid' : '' }}" name="fecha_viaje" value="{{ old('fecha_viaje') }}">
                          @if ($errors->has('fecha_viaje'))
                          <span class="invalid-feedback" role="alert"></span>
                          @endif  
                      <div class style="margin-left: 60px">            
                          <button type="submit" style="width: 300px; height:70px;margin-left: 45px" class=" btn btn-success">Ver Hoteles</button>
                      </div>
                  </div>        
              </div>       
          </div>
      </div>
  </div>

</form>
@endsection