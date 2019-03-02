@extends('layouts.base')
@section('content')

@if (session('statusCheckIn1'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalCheckIn1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">Esta reserva ya cuenta con el check-in realizado</p> 
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
  $("#ModalCheckIn1").modal("show");
});
</script>
@endif

<!--==========================
    Intro Section
  ============================-->
<form action="/Asiento_Vuelo/CheckInVuelo/" method="get">
<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Realiza tu Check In') }}</div>

                    <div class="card-body">

                        <div class="row justify-content-start">
                            <div class="col-4">
                                <label for="codigo_reserva" style="margin-top: 10%; margin-left: 30%;font-size: 150%" class="col-form-label">{{ __('Ingrese el codigo de su reserva') }}</label>
                            </div>
                            <div class="col-4">

                                <input
                                    style="margin-left: 40%;margin-top: 20%"
                                    placeholder="Código reserva"
                                    id="codigo_reserva"
                                    name="codigo_reserva"
                                    type="text"
                                    class="form-control form-control-lg"
                                    required
                                    autofocus
                                >
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin-top: 10%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-get-started scrollto">
                                    {{ __('Buscar') }}
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