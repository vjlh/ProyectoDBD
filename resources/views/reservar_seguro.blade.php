@extends('layouts.base')
@section('content')


<?php
$costoFinal_individual = session()->get('costoFinalIndividual_seguro');
$costoFinal_grupal = session()->get('costoFinalGrupal_seguro');
$num_personas = session()->get('numeroPasajeros_seguro');
?>

  <!--==========================
    Intro Section
    
  ============================-->
<section id="intro">
    <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/5.jpg')}}" alt=""></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dbd-auth" style="margin-top: -80%; color: white; background-color: #212529c7;">
                    <center><div class="card-header">Los beneficios que desea incorporar a su seguro son los siguientes</div></center>
                    
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th scope="col">Beneficio</th>
                                    <th scope="col">Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seguros_seleccionados as $seguros)
                                <tr>
                                    <td>{{$seguros->nombre_beneficio}}</td>
                                    <td>${{$seguros->precio_beneficio}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                </tbody>
                                <table class="table table-hover">
                                <tbody >
                                    <td>Costo individual del seguro</td>
                                    <td>${{$costoFinal_individual}}</td>
                                </tr>
                                <tr>
                                    <td>Costo final del seguro con los beneficios para {{$num_personas}} personas</td>
                                    <td>${{$costoFinal_grupal}}</td>
                                </tr>
                                </tbody>
                                </table>
                                 
                        </table>
                        <center>
                        <a href="{{ URL::previous() }}" class="btn btn-success btn-get-started scrollto">Regresar</a>
                        <a href="/Beneficio_Seguro/AdquirirSeguro/" class="btn btn-success btn-get-started scrollto">Reservar Seguro</a>
                        </center>
                    </div>     
                </div>
            </div>
        </div>    
    </div>
</div>




@endsection