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

<form action="/Beneficio/Listado/" method="get">
<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Realiza tu Check In') }}</div>

                    <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                        <i class="material-icons" style="font-size:450%;color:white;">airplanemode_active</i>
                        </div>
                        <div class="col-4" style="margin-left:-25%;margin-top:2%">                        
                        <!--<h3>$vuelo->origen_vuelo -> $vuelo->destino_vuelo</h3>-->
                        <h3>Tu viaje a Percy</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="margin-left:30%">
                            <h4>Detalles del vuelo reservado</h4>
                        </div>    
                    </div>    

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