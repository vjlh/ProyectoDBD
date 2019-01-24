@extends('layouts.app')
@section('content')
@include('includes.carousel')

<h1>
    Vuelos Disponibles
</h1>

<table class="table table-hover table-striped">
<tr>
<th><h5 class="card-title"></h5></th>
<th><h5 class="card-title">Origen</h5></th>
<th><h5 class="card-title">Destino</h5></th>
<th><h5 class="card-title">Duración</h5></th>
<th><h5 class="card-title">Fecha</h5></th>
</tr>

@foreach($vuelos as $vuelo)

<tr>
<th>
    <center>
    <a href="\" class="btn btn-danger" style="vertical-align:middle"><span>Reservar</span></a>
    </center>
    </th>
<th><h5 class="card-title">{{$vuelo->origen_vuelo}}</h5></th>
<th><h5 class="card-title">{{$vuelo->destino_vuelo}}</h5></th>    
<th><h5 class="card-title">{{$vuelo->duracion_vuelo}}</h5></th>
<th><h5 class="card-title">{{$vuelo->fecha_vuelo}}</h5></th>


</tr>
    @endforeach
    </table>

@endsection
