@extends('layouts.base')
@section('content')
<?php
use App\Hospedaje;
use App\Habitacion;
use App\Transporte;
if($paquete->tipo_paquete == 'Alojamiento'){
    $tipo = 'Alojamiento';
} elseif($paquete->tipo_paquete == 'Automóvil'){
    $tipo = 'Automóvil';
} elseif($paquete->tipo_paquete == 'All'){
    $tipo = 'Alojamiento + Automóvil';
}
?>

 <!--==========================
    Intro Section
  ============================-->
  <form action="Paquete/reservarPaquete/" method="get">
  <section id="intro">
  <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/5.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -80%; color: white; background-color: #212529c7;">
                <div class="card-header">Detalle paquete</div>
                <div class="card-body">
                <table class="table" >
                    <tbody>
                        <tr>
                            <th>Destino</th>
                            <td>{{$paquete->destino_paquete}}</td>
                        </tr>
                        <tr>
                            <th>Paquete incluye:</th>
                            <td>{{$tipo}}</td>
                        </tr>
                        <tr>
                            <th>Número de días</th>
                            <td>{{$paquete->num_dias}}</td>
                        </tr>
                        <tr>
                            <th>Numero de noches:</th>
                            <td>{{$paquete->num_noches}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de partida:</th>
                            <td>{{$paquete->fecha_paquete}}</td>
                        </tr>
                        <tr>
                            <th>Precio del paquete:</th>
                            <td>${{$paquete->precio_paquete}}/Pers.</td>
                        </tr>
                        <tr>
                            <th>Datos de los vuelos</th>
                            <td>
                                @include('includes.datos_vuelo_paquete')
                                <a class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#ModalDatosVueloPaquete">Vuelo</a>
                            </td>
                        </tr>
                        @if($paquete->tipo_paquete == 'Alojamiento')
                        <tr>
                            <th>Datos del alojamiento</th>
                            <td>
                                @include('includes.datos_hospedaje_paquete')
                                <a class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#ModalDatosHospedajePaquete">Hospedaje</a>
                            </td>
                        </tr>
                        @elseif($paquete->tipo_paquete == 'Automóvil')
                        <tr>
                            <th>Datos del transporte</th>
                            <td>
                                @include('includes.datos_transporte_paquete')
                                <a class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#ModalDatosTransportePaquete">Transporte</a>
                            </td>
                        </tr>
                        @elseif($paquete->tipo_paquete == 'All')
                        <tr>
                           <th>Datos del alojamiento</th>
                            <td>
                                @include('includes.datos_hospedaje_paquete')
                                <a class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#ModalDatosHospedajePaquete">Hospedaje</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Datos del transporte</th>
                            <td>
                                @include('includes.datos_transporte_paquete')
                                <a class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#ModalDatosTransportePaquete">Transporte</a>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <th>Ingrese el número de pasajeros</th>
                            <td>
                                <select class="form-control selectpicker custom-select" name="num_pasajeros">
                                  <option selected disable>Número de pasajeros</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @guest
             <!-- Trigger the modal with a button -->
             <center>
             <button type="button" style="margin-top:40px;text-align:center;height:60px;width:200px" class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Reservar</button>
             </center>

            @include('includes.registrarse')

            @else
            
            <center>
            <a href="/Paquete/reservarPaquete/{{$paquete->id}}" style="margin-top:40px;text-align:center;height:60px;width:200px"class="btn btn-success btn-get-started scrollto">Reservar</a>
            </center>
            @endguest  
            </div>       
            </div>
        </div>
    </div>
</section>
</form>
<!--/Paquete/Reservar/{{$paquete->id}}-->



@endsection