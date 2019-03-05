@extends('layouts.base')
@section('content')

@if (session('statusHabitaciones'))

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalAlertaFechaHabitacion" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">Lo sentimos!, no existen habitaciones disponibles para el hospedaje seleccionado.</p>
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
    $("#ModalAlertaFechaHabitacion").modal("show");
  });
</script>
@endif

<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
<section id="about" >
<div class="container" style="margin-top: 10%;">
<div class="row about-cols">
@foreach ($hospedajes as $hospedaje)

<div class="col-md-4 wow ">
    <div class="about-col">
        <div class="img">
        <img src="{{asset('assets/img/hyatt.jpg')}}" alt="" class="img-fluid">
        <div class="icon"><i class="ion-ios-home"></i></div>
        </div>
        <h2 class="title"><a>{{$hospedaje->nombre_hospedaje}}</a></h2>
        <center><h6 class="subtitle"><a>{{$hospedaje->ubicacion}}</a></h6></center>
        <p>Cadena: {{$hospedaje->cadena_hospedaje}}</p>
        <p>Estrellas: {{$hospedaje->estrellas_hospedaje}}</p>
        @if($hospedaje->estacionamiento_hospedaje == 0)
            <p>Estacionamiento: No </p>
        @else
            <p>Estacionamiento: Sí </p>
        @endif

        @if($hospedaje->piscina_hospedaje == 0)
            <p>Piscina: No </p>
        @else
            <p>Piscina: Sí </p>
        @endif

        @if($hospedaje->sauna_hospedaje == 0)
            <p>Sauna: No </p>
        @else
            <p>Sauna: Sí </p>
        @endif

        @if($hospedaje->zona_infantil_hospedaje == 0)
            <p>Zona infantil: No </p>
        @else
            <p>Zona infantil: Sí </p>
        @endif

        @if($hospedaje->gimnasio_hospedaje == 0)
            <p>Gimnasio: No </p>
        @else
            <p>Gimnasio: Sí </p>
        @endif

        @if($paquete != NULL)
        <center>
        <a href="/Paquete/reservarPaquete/{{$paquete->id}}/{{$vuelo->id}}/{{$hospedaje->id}}/{{$num_pasajeros}}" class="btn btn-get-started scrollto">Seleccionar</a>
        </center>
        @else
        <center>
        <a href="/Habitacion/{{$hospedaje->id}}" class="btn btn-get-started scrollto">Ver Habitaciones</a>
        </center>
        @endif
    </div>
</div>

        
@endforeach
</div>
</div>
</section><!-- #about -->
</section>






@endsection


