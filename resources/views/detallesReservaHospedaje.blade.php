@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<?php
$dias = session()->get('diasDiferencia');
$hospedaje = session()->get('hospedaje');
?>

<div class="content" style="padding: 50px;">
    <div class="flex-center position-ref">
        <div class="card card_compra text-white bg-primary mb-3 border-success" style="top: -155px; background-color: #2c3e50d9 !important;">
            <h2><div class="card-header">Detalle de la reserva realizada</div></h2>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nombre Hotel</th>
                            <td>{{$hospedaje->nombre_hospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Tipo de habitacion:</th>
                            <td>{{$habitacion->tipo}}</td>
                        </tr>
                        <tr>
                            <th>Costo diario habitacion:</th>
                            <td>${{$habitacion->precio}}</td>
                        </tr>
                        <tr>
                            <th>Numero de días</th>
                            <td>{{$dias}}</td>
                        </tr>
                            <th>Fecha inicio</th>
                            <td>{{session()->get('fecha_ida')}}</td>
                        </tr>
                            <th>Fecha termino</th>
                            <td>{{session()->get('fecha_vuelta')}}</td>
                        </tr>
                            <th>Costo total</th>
                            <td>${{session()->get('costo_final')}}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/" class="btn btn-success">Volver a la pagina principal</a>
            </div>       
        </div>
    </div>
</div>

@endsection