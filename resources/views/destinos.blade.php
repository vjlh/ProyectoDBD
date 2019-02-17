@extends('layouts.base')
@section('content')



<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
<section id="about">
<div class="container" style="margin-top: 10%;">
<div class="row about-cols">
@foreach ($paises as $pais)


          <div class="col-md-4 wow ">
            <div class="about-col">
              <div class="img">
              <img src="{{asset('assets/img/destinos.jpeg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-plane"></i></div>
              </div>
              <h2 class="title"><a>{{$pais->nombre_pais}}</a></h2>
              <center><h5 class="card-title" style="margin-boot: 30%;">Moneda: {{$pais->moneda_pais}}</h5></center>
            </div>
          </div>


        
@endforeach
</div>
</div>
</section><!-- #about -->
</section>

</div>

@endsection
