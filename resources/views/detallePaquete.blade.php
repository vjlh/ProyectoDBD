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
                <div class="card-header">Reserva Realizada</div>
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
                            <th>Precio del paquete:</th>
                            <td>${{$paquete->precio_paquete}}</td>
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
            <a href="/Paquete/Reservar/{{$paquete->id}}" style="margin-top:40px;text-align:center;height:60px;width:200px"class="btn btn-success btn-get-started scrollto">Reservar</a>
            </center>
            @endguest  

                
            </div>       
                
                </div>
            </div>
        </div>    
    </div>

    </div>





@endsection