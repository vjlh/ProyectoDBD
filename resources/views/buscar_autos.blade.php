@extends('layouts.base')
@section('content')


@if (session('statusCity'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalAlertaUbicacionTransporte" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">Lo sentimos!, aún no existen vehículos disponibles para la ciudad seleccioanda.</p>
      </div>
      <div class="modal-footer">
        <a style="margin: auto;"class="btn btn-success " data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    // Show the Modal on load
    $("#ModalAlertaUbicacionTransporte").modal("show");
  });
</script>
@endif

@if (session('statusDisponibilidad'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalAlertaFechaDisponible" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">Lo sentimos!, no existen vehículos disponibles para la fecha seleccionada.</p>
      </div>
      <div class="modal-footer">
        <a style="margin: auto;"class="btn btn-success " data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    // Show the Modal on load
    $("#ModalAlertaFechaDisponible").modal("show");
  });
</script>
@endif
<form action="/Transporte" method="get">

<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Buscando Automóvil') }}</div>

                <div class="card-body">


                <div class="row justify-content-start">
                    <div class="col-4">
                    <label for="ciudad_inicio" style="margin-left: 15%" class="col-form-label">{{ __('Ciudad') }}</label>   
                    </div>
                </div>


                <div class="row justify-content-start">
                    <div class="col-4"> 
                      <select style="margin-left: 15%" class="form-control selectpicker custom-select" id="ciudad_inicio" name="ciudad_inicio" required>
                          <option value="" selected disable>Ciudad</option>
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
                    <label for="ciudad_origen" style="margin-left: 15%" class="col-form-label">{{ __('Fecha Inicio') }}</label>   
                    </div>
                    <div class="col-4">
                    <label for="numero_personas" style="margin-left: 15%" class="col-form-label">{{ __('Fecha Fin') }}</label>
                    </div>
                </div>
                <?php 
                use Carbon\Carbon;
                $hoy= Carbon::now(); 
                ?>
                  
                  <div class="row justify-content-start">
                    <div class="col-4">
                        <input id="fecha_ida" onchange="changeFecha(this.value)" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" name="fecha_inicio" value="{{ old('fecha_inicio') }}" min={{$hoy}} required>
                            @if ($errors->has('fecha_inicio'))
                            <span class="invalid-feedback" role="alert"></span>
                            @endif
                    </div>
                    <script>
                      function changeFecha(val){
                        document.getElementById("fecha_vuelta").min = val;
                      }
                    </script>
                    <div class="col-4">
                        <input id="fecha_vuelta" style="margin-left: 15%" type="date" class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" name="fecha_fin" min={{$hoy}} required>
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