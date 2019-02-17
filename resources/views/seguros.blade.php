@extends('layouts.base')
@section('content')


<!--<form action="/reservar_seguro" method="get">-->

<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) }</style>
<section id="about" >
<div class="container" style="margin-top: 10%;">
<div class="row about-cols">
@foreach ($seguros as $seguro)


          <div class="col-md-4 wow ">
            <div class="about-col">
              <div class="img">
              <img src="{{asset('assets/img/about-plan.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-medkit"></i></div>
              </div>
                <h2 class="title"><a>Seguro: {{$seguro->tipo_seguro}}</a></h2>
                <p>Precio: {{$seguro->precio_seguro}}</p>
                <center>
                <a class="btn btn-get-started scrollto">Incorporar</a>
                </center>
            </div>
          </div>


        
@endforeach
</div>
</div>
</section><!-- #about -->
</section>

</div>




</form>

@endsection