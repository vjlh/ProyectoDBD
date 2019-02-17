@extends('layouts.base')
@section('content')


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<form action="/reservar_auto" method="get">
<div class="form-group row" style="margin-left:50px">
@foreach ($promociones as $promocion)
    <div class="card mb-3 border-dark mb-3" style="width: 18rem; margin-top:20px;margin-left:40px;margin-rigth:20px">
        <img class="card-img-top" src="/images/hotel.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Promoción: {{$promocion->nombre_promocion}}</h5>
                <h5 class="card-title">Descuento: {{$promocion->descuento_promocion}}%</h5>
                <p class="card-text">
                    <p>Descripción: {{$promocion->descripcion_promocion}}</p>
                </p>
            <a class="btn btn-primary">Obtener</a>
        </div>
    </div>          
@endforeach
</div>

</form>
@endsection