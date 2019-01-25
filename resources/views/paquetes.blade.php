@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/Paquete" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($paquetes as $paquete)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="/images/paquete.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$paquete->destino_paquete}}</h5>
          
            <a href="/Paquete/{{$paquete->id}}" class="btn btn-primary">Ver detalles</a>
        </div>
    </div>          
@endforeach
</div>

</form>
@endsection