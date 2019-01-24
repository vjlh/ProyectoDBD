@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<h1>
    Vehículos Disponibles
</h1>

<?php

  $vehiculos = array();
  foreach ($transportes as $transporte) {
    if() {
      $vehiculos[] = $transporte;
    }
  }

?>
<table class="table table-hover table-striped">
<tr>
<th><h5 class="card-title"></h5></th>
<th><h5 class="card-title">Modelo</h5></th>
<th><h5 class="card-title">Patente</h5></th>
<th><h5 class="card-title">Puntuación</h5></th>
<th><h5 class="card-title">Costo</h5></th>
</tr>

@foreach($transportes as $transporte)

<tr>
<th>
    <center>
    <a href="/reservar_auto/{{$transporte->id}}" class="btn btn-danger" style="vertical-align:middle"><span>Reservar</span></a>
    </center>
    </th>
<th><h5 class="card-title">{{$transporte->modelo_transporte}}</h5></th>
<th><h5 class="card-title">{{$transporte->patente_transporte}}</h5></th>
<th><h5 class="card-title">{{$transporte->puntuacion_transporte}}</h5></th>
<th><h5 class="card-title">costo</h5></th>

</tr>
    @endforeach
    </table>

@endsection
