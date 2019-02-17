@extends('layouts.base')
@section('content')
@include('includes.registrarse')


<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
<section id="about" >
<div class="container" style="margin-top: 10%;">
<div class="row about-cols">
    @foreach ($habitaciones as $habitacion)
   
        <div class="col-md-4 wow ">
            <div class="about-col">
              <div class="img">
              <img src="{{asset('images/habitacion.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-home"></i></div>
              </div>
              <form action="/Habitacion_Reserva/{{$habitacion->id}}/" method="PATCH">
              <h2 class="title"><a>{{$habitacion->tipo}}</a></h2>
              <p>Costo (por dia): {{$habitacion->precio}}</p>
                    <p>Capacidad: {{$habitacion->capacidad_habitacion}}</p>
                    @if($habitacion->banio_privado == 0)
                    <p>Baño Privado: No</p>
                    @endif
                    @if($habitacion->banio_privado == 1)
                    <p>Baño Privado: Sí</p>
                    @endif
                    @if($habitacion->aire_acondicionado_habitacion == 0)
                    <p>Aire Acondicionado: No</p>
                    @endif
                    @if($habitacion->aire_acondicionado_habitacion == 1)
                    <p>Aire Acondicionado: Sí</p>
                    @endif   

            @guest
             <!-- Trigger the modal with a button -->
             <center>
                <button type="button" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Reservar</button>
             </center>
           

            @else

            <center>
                
                <button type="submit" class="btn btn-get-started scrollto">Reservar</button>
            </center>
            
            @endguest

            </form>   
            </div>
          </div>
    </form>   
         
         
@endforeach

</div>
</div>
</section><!-- #about -->  
</section>


</div>


@endsection
