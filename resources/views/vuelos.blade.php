@extends('layouts.app')
@section('content')
@include('includes.carousel')

@foreach ($vuelos as $vuelo)
<h1><small> Hora_Vuelo: {{ $vuelo->hora_vuelo}}</small><small> - Avion_capacidad: {{$vuelo->aviones->capacidad_avion}}</small></h1>
@endforeach

@endsection