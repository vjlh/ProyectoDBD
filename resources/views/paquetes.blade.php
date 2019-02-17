@extends('layouts.base')
@section('content')


<form action="/Paquete" method="get">
<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
<section id="about">
<div class="container" style="margin-top: 10%;">
<div class="row about-cols">
@foreach ($paquetes as $paquete)


          <div class="col-md-4 wow ">
            <div class="about-col">
              <div class="img">
              <img src="/images/paquete.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-box"></i></div>
              </div>
              <h2 class="title"><a>{{$paquete->destino_paquete}}</a></h2>
              <center><a href="/Paquete/{{$paquete->id}}" class="btn btn-get-started scrollto">Ver detalles</a></center>
            </div>
          </div>


        
@endforeach
</div>
</form>
</div>
</section><!-- #about -->
</section>

</div>

@endsection