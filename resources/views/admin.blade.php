@extends('layouts.base')
@section('content')

@guest
<?php
header('Location: /');
?>
@else

@if(Auth::user()->administrador == 1)

<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
<section id="about">
<div class="container" style="margin-top: 10%;">
<div class="row justify-content-center">
<div class="col-md-14">      
@if (session()->has('success_message'))
          <div class="alert alert-success">
              {{ session()->get('success_message')}}
          </div>
@endif
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active btn-get-started" id="vuelos-tab" data-toggle="tab" href="#vuelos" role="tab" aria-controls="vuelos" aria-selected="true">Vuelos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-get-started" id="hoteles-tab" data-toggle="tab" href="#hoteles" role="tab" aria-controls="hoteles" aria-selected="false">Hoteles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-get-started" id="seguros-tab" data-toggle="tab" href="#seguros" role="tab" aria-controls="seguros" aria-selected="false">Seguros</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-get-started" id="paquetes-tab" data-toggle="tab" href="#paquetes" role="tab" aria-controls="paquetes" aria-selected="true">Paquetes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-get-started" id="autos-tab" data-toggle="tab" href="#autos" role="tab" aria-controls="autos" aria-selected="false">Automóviles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-get-started" id="habitaciones-tab" data-toggle="tab" href="#habitaciones" role="tab" aria-controls="habitaciones" aria-selected="false">Habitaciones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-get-started" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-get-started" id="historiales-tab" data-toggle="tab" href="#historiales" role="tab" aria-controls="historiales" aria-selected="false">Historial del Sistema</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="vuelos" role="tabpanel" aria-labelledby="vuelos-tab">
    @include('includes.admin_vuelos')
  </div>
  <div class="tab-pane fade" id="hoteles" role="tabpanel" aria-labelledby="hoteles-tab">
    @include('includes.admin_hospedajes')
  </div>
  <div class="tab-pane fade" id="seguros" role="tabpanel" aria-labelledby="seguros-tab">
    @include('includes.admin_seguros')
  </div>
  <div class="tab-pane fade" id="paquetes" role="tabpanel" aria-labelledby="paquetes-tab">
    @include('includes.admin_paquetes')
  </div>
  <div class="tab-pane fade" id="autos" role="tabpanel" aria-labelledby="autos-tab">
    @include('includes.admin_autos')
  </div>
  <div class="tab-pane fade" id="habitaciones" role="tabpanel" aria-labelledby="habitaciones-tab">
    @include('includes.admin_habitaciones')
  </div>
  <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
    @include('includes.admin_usuarios')
  </div>
  <div class="tab-pane fade" id="historiales" role="tabpanel" aria-labelledby="historiales-tab">
    @include('includes.admin_historial')
  </div>
  
</div>
</div>
</div>
</div>

</section><!-- #about -->
</section>
@endif

@if(Auth::user()->administrador == 0)
<?php
header('Location: /');
?>
@endif
@endguest


@endsection

