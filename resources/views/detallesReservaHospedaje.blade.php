@extends('layouts.base')
@section('content')


<?php
$dias = session()->get('diasDiferencia');
$hospedaje = session()->get('hospedaje');
?>


  <!--==========================
    Intro Section
  ============================-->
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
                            <th>Nombre Hotel</th>
                            <td>{{$hospedaje->nombre_hospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Tipo de habitación:</th>
                            <td>{{$habitacion->tipo}}</td>
                        </tr>
                        <tr>
                            <th>Costo diario habitación:</th>
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