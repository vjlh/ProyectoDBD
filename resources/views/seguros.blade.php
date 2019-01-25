@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/reservar_auto" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($seguros as $seguro)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="/images/hotel.jpg" alt="Card image cap">
        <div class="card-body">
                <p class="card-text">
                    <p>Tipo de seguro: {{$seguro->tipo_seguro}}</p>
                    <p>Precio: {{$seguro->precio_seguro}}</p>
                </p>
            <a class="btn btn-primary">Incorporar</a>
        </div>
    </div>          
@endforeach
</div>

</form>
@endsection