@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/Asiento" method="PATCH">

<h1>
    Asientos disponibles
</h1>

<table class="table table-hover table-striped">
<tr>
<th><h5 class="card-title"></h5></th>
<th><h5 class="card-title">Número</h5></th>
<th><h5 class="card-title">Letra</h5></th>
<th><h5 class="card-title">Precio</h5></th>
<th><h5 class="card-title">Disponibilidad</h5></th>
<th><h5 class="card-title">Cabina</h5></th>

</tr>

@foreach($asientos as $asiento)

<tr>
<th>
<center>
    <a href="/Asiento/Reservar/{{$asiento->id}}" class="btn btn-success">Reservar</a>
    </center>
    </th>


<th><h5 class="card-title">{{$asiento->numero_asiento}}</h5></th>
<th><h5 class="card-title">{{$asiento->letra_asiento}}</h5></th>    
<th><h5 class="card-title">{{$asiento->precio_asiento}}</h5></th>
<th><h5 class="card-title">{{$asiento->disponibilidad}}</h5></th>
<th><h5 class="card-title">{{$asiento->cabina}}</h5></th>


</tr>
    @endforeach
    </table>

@endsection
