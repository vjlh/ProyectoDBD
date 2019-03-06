@extends('layouts.base')
@section('content')

<!--==========================
    Intro Section
  ============================-->
<?php
use Carbon\Carbon;
setlocale(LC_TIME, 'es_ES.UTF-8'); 
Carbon::setLocale('es'); 
$fecha = Carbon::parse($vuelo->fecha_vuelo)->formatLocalized('%d %B %Y');

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<form action="/Reserva/Check-in/" method="get">
    <section id="intro">
        <div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                        <div class="card-header">{{ __('Codigo de reserva: ') }} {{$cod_obtenido}}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">                        
                                        <label style="font-family:WildWest;font-size:200%">{{$vuelo->origen_vuelo}}</label> 
                                        <i class="material-icons" style="font-size:200%;color:orange;">flight_takeoff</i>
                                        <label style="font-family:WildWest;font-size:200%">  {{$vuelo->destino_vuelo}}</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="font-family:Trebuchet MS;font-size:130%">{{$user->name}} {{$user->apellido_usuario}}</label>
                                    </div>    
                                </div>
                                
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>
                                            <i class="material-icons" style="font-size:170%;color:orange;">date_range</i>
                                            Fecha del vuelo</th>

                                            <td>{{$fecha}} </td>
                                        </tr>
                                        <tr>
                                            <th>
                                            <i class="material-icons" style="font-size:170%;color:orange;">watch_later</i>
                                            Hora del vuelo</th>
                                            <td>
                                                {{$vuelo->hora_vuelo}} 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                
                                <i class="material-icons" style="font-size:200%;color:orange;">event_seat</i>
                                <label>Asientos reservados</label>
                                <?php
                                    $count = 0;
                                ?>
                                <table class="table table-sm">
                                    <tbody>
                                        @foreach ($asientos as $asiento)
                                        <?php
                                            $count++;
                                        ?>
                                        <tr>
                                            <td>
                                                {{$count}} - {{$asiento->cabina}}
                                            </td>
                                            <td>
                                                {{$asiento->letra_asiento}} {{$asiento->numero_asiento}}
                                            </td>
                                            <td>
                                            @include('includes.modal_pasajeros_checkin')
                                            <a class="btn btn-success btn-get-started scrollto" style="margin-left:40%" data-toggle="modal" data-target="#ModalPasajero">completar datos pasajero</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <input type="hidden" value="{{$cod_obtenido}}" name="codigo_reserva", id="codigo_reserva">   
                                <div class="form-group row mb-0">
                                     <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-get-started scrollto">{{ __('Realizar Check-In') }}</button>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection