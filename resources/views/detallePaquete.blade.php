@extends('layouts.base')
@section('content')



 <!--==========================
    Intro Section
  ============================-->
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
                            <th>Número de días</th>
                            <td>{{$paquete->num_dias}}</td>
                        </tr>
                        <tr>
                            <th>Numero de noches:</th>
                            <td>{{$paquete->num_noches}}</td>
                        </tr>
                        <tr>
                            <th>Paquete incluye:</th>
                            <td>{{$paquete->tipo_paquete}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de partida:</th>
                            <td>{{$paquete->fecha_paquete}}</td>
                        </tr>
                        <tr>
                            <th>Precio del paquete:</th>
                            <td>${{$paquete->precio_paquete}}</td>
                        </tr>
                        
                    </tbody>
                </table>
            <?php
            use App\Vuelo;
            $vuelos = Vuelo::all();
            $validos = array();
            foreach ($vuelos as $vuelo) {
                if($vuelo->destino_vuelo == $paquete->destino_paquete){
                    if($vuelo->fecha_vuelo == $paquete->fecha_paquete){
                        $validos[] = $vuelo;
                    }
                }
            }
            ?>
            @if ($validos != NULL)
            @guest
             <!-- Trigger the modal with a button -->
             <center>
             <button type="button" style="margin-top:40px;text-align:center;height:60px;width:200px" class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Seleccionar vuelo</button>
             </center>

            @include('includes.registrarse')

            @else
            
            <center>
            <a href="/vuelo_paquete/{{$paquete->id}}" style="margin-top:40px;text-align:center;height:60px;width:200px"class="btn btn-success btn-get-started scrollto">Seleccionar vuelo</a>
            </center>
            @endguest  
            @elseif($validos == NULL)
            @guest
             <!-- Trigger the modal with a button -->
             <center>
             <button type="button" style="margin-top:40px;text-align:center;height:60px;width:200px" class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Seleccionar vuelo</button>
             </center>

            @include('includes.registrarse')

            @else
            @include('includes.alerta_vuelos_paquete')
            <center>
            <a style="margin-top:40px;text-align:center;height:60px;width:200px"class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#ModalAlertaVueloPaquete">Seleccionar vuelo</a>
            </center>
            @endguest  
            @endif
                
            </div>       
                
                </div>
            </div>
        </div>    
    </div>

    </div>

<!--/Paquete/Reservar/{{$paquete->id}}-->



@endsection