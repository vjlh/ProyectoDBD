@extends('layouts.base')
@section('content')


<?php
$duracion = session()->get('diasDuracion_seguro');
$beneficios_seguro = session()->get('beneficiosSeleccionados_seguro');
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
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th>Tipo de seguro:</th>
                            <td>{{$seguro->tipo_seguro}}</td>
                        </tr>
                        <tr>
                            <th>Numero de personas que cubre el seguro:</th>
                            <td>{{$seguro->numero_pasajeros_seguros}}</td>
                        </tr>
                        
                        <tr>
                            <th>Destino del seguro:</th>
                            <td>{{$seguro->destino_seguro}}</td>
                        </tr>
                        <tr>
                            <th>Numero de días</th>
                            <td>{{$duracion}}</td>
                        </tr>
                        <tr>
                            <th>Fecha inicio</th>
                            <td>{{$seguro->fecha_inicio_seguro}}</td>
                        </tr>
                        <tr>
                            <th>Fecha termino</th>
                            <td>{{$seguro->fecha_fin_seguro}}</td>
                        </tr>
                          
                    </tbody>
                </table>
                <table class="table table-sm table-bordered table-hover">
                    <thead >
                        <tr>
                            <th scope="col">Beneficios del seguro contratado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficios_seguro as $beneficios)
                        <tr>
                            <td>{{$beneficios->nombre_beneficio}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Costo total del seguro</td>
                            <td>${{$seguro->precio_seguro}}</td>
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