@extends('layouts.base')
@section('content')


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<?php
$dias = session()->get('diasTransporte');
$fecha_i = session()->get('fechaInicioTransporte');
$fecha_f = session()->get('fechaFinTransporte');
$costo = session()->get('costoReservaTransporte');
?>


<section id="intro">
  <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/5.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -80%; color: white; background-color: #212529c7;">
                <div class="card-header">Reserva Realizada</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Modelo vehículo</th>
                                <td>{{$transporte->modelo_transporte}}</td>
                            </tr>
                            <tr>
                                <th>Patente:</th>
                                <td>{{$transporte->patente_transporte}}</td>
                            </tr>
                            <tr>
                                <th>Numero de días</th>
                                <td>{{$dias}}</td>
                            </tr>
                                <th>Fecha inicio</th>
                                <td>{{$fecha_i}}</td>
                            </tr>
                                <th>Fecha termino</th>
                                <td>{{$fecha_f}}</td>
                            </tr>
                                <th>Costo total</th>
                                <td>${{$costo}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <center>
                    <a href="/" class="btn btn-success btn-get-started scrollto">Volver a la pagina principal</a>
                    </center>

                </div>       
                
            </div>
            </div>
        </div>    
    </div>

</div>

@endsection