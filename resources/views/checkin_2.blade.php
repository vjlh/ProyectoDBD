@extends('layouts.base')
@section('content')

<!--==========================
    Intro Section
  ============================-->
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
                <div class="card-header">{{ __('Codigo de reserva: ') }} {{$id_obtenida}}</div>

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

                            <td>{{$vuelo->fecha_vuelo}} </td>
                        </tr>
                        <tr>
                            <th>
                            <i class="material-icons" style="font-size:170%;color:orange;">watch_later</i>
                            Hora del vuelo</th>
                            <td>
                                {{$vuelo->hora_vuelo}} 
                            </td>
                        </tr>
                        <tr>
                            <th>
                            <i class="material-icons" style="font-size:200%;color:orange;">event_seat</i>
                            Asiento reservado</th>

                            <td>
                                {{$asiento->letra_asiento}} {{$asiento->numero_asiento}}
                            </td>
                        </tr>
                            
                    </tbody>
                </table>
                <input type="hidden" value="{{$id_obtenida}}" name="codigo_reserva", id="codigo_reserva">   

                        <div class="form-group row mb-0" style="margin-top: 10%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-get-started scrollto">
                                    {{ __('Realizar Check-In') }}
                                </button>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>

</form>
@endsection