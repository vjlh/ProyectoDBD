@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/reservar_auto" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($paises as $pais)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="/images/hotel.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">País: {{$pais->nombre_pais}}</h5>
                <h5 class="card-title">Moneda: {{$pais->moneda_pais}}</h5>
        </div>
    </div>          
@endforeach
</div>

</form>
@endsection