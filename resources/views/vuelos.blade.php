@extends('layouts.base')
@section('content')


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
                <input type="hidden" value="{{$vuelo->aviones->id}}" name="avioncito_id" id="avioncito_id">
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
