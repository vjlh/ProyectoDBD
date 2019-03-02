@extends('layouts.base')
@section('content')


@if (session('statusAsientos'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalAsientosVuelo" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">Lo sentimos!, No hay asientos disponibles en el vuelo seleccionado para la cantidad de pasajeros ingresada.</p>
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
    $("#ModalAsientosVuelo").modal("show");
  });
</script>
@endif

<form action="/Asiento" method="get">
<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
<section id="about" >
<div class="container" style="margin-top: 10%;">
<div class="row about-cols">
@foreach ($vuelos as $vuelo)


<div class="col-md-4 wow ">
            <div class="about-col">
              <div class="img">
              <img src="{{asset('images/avioncito.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-plane"></i></div>
              </div>
              <h2 class="title"><a>Destino: {{$vuelo->destino_vuelo}}</a></h2>
              <center><h6 class="subtitle"><a>Origen: {{$vuelo->origen_vuelo}}</a></h6></center>
              
                    <p>fecha: {{$vuelo->fecha_vuelo}}</p>
                    <p>hora despegue: {{$vuelo->hora_vuelo}}</p>
                    <p>duración vuelo: {{$vuelo->duracion_vuelo}}</p>

                <center>
                <input type="hidden" value="{{$num_pasajeros}}" name="num_pasajeros", id="num_pasajeros">
                <input type="hidden" value="{{$vuelo->id}}" name="vuelo" id="vuelo">
                <button type="submit" class="btn btn-get-started">Ver Asientos</button>
                </center>
            </div>
          </div>


        
@endforeach
</div>
</div>
</section><!-- #about -->
</section>





</form>

@endsection
