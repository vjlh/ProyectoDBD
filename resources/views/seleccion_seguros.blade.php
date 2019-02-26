@extends('layouts.base')
@section('content')


<!--<form action="/reservar_seguro" method="get">-->

<section id="intro">
  <style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
  <section id="about" >
    <div class="container" style="margin-top: 10%;">
    <form action="/Seguro/CalculoCosto" method="get">
      <div class="row about-cols">
        @foreach ($seguros as $seguro)
          <div class="col-md-4 wow" style="margin-top: 5%">
            <div class="about-col"style="height:100%">
            <center><input type="checkbox" class="form-check-input" id="{{$seguro->id}}" name="{{$seguro->id}}">
                <label class="form-check-label" for="{{$seguro->id}}">Incorporar</label></center>
              <div class="img">
                <img src="{{asset('assets/img/about-plan.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-medkit"></i></div>
              </div>
                <center><h2 class="title" style="margin-top: 10%;"><a>{{$seguro->nombre_beneficio}}</a></h2></center>
                <p>Descripcion Seguro: {{$seguro->descripcion_beneficio}}</p>
            </div>
          </div>          
        @endforeach      
      </div>
      @guest
        <!-- Trigger the modal with a button -->
        <center>
            <button type="button" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Calcular costo</button>
        </center>
        @else
        <center>
            <button type="submit" class="btn btn-get-started scrollto">Calcular costo</button>
        </center>
      @endguest
    </form> 
    </div>
  </section><!-- #about -->
</section>


@endsection