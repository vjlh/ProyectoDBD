@extends('layouts.base')
@section('content')
@include('includes.registrarse')
@include('includes.reservado')



<form action="/Asiento" method="PATCH">

<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Asientos Disponibles') }}</div>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Número</h5></th>
                    <th><h5 class="card-title">Letra</h5></th>
                    <th><h5 class="card-title">Precio</h5></th>
                    <th><h5 class="card-title">Disponibilidad</h5></th>
                    <th><h5 class="card-title">Cabina</h5></th>
                    <th><h5 class="card-title"></h5></th>

                    </tr>

                    @foreach($asientos as $asiento)

                    <tr>
                    


                    <th><h5 class="card-title">{{$asiento->numero_asiento}}</h5></th>
                    <th><h5 class="card-title">{{$asiento->letra_asiento}}</h5></th>    
                    <th><h5 class="card-title">{{$asiento->precio_asiento}}</h5></th>
                    <th><h5 class="card-title">{{$asiento->disponibilidad}}</h5></th>
                    <th><h5 class="card-title">{{$asiento->cabina}}</h5></th>
                    <th>


                    <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">

                            <div class="modal-body" style="color: white;">
                                <p style="color: white;">Su reserva ha sido realizada con exito!.</p>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Volver</button> -->
                                <a href="/Asiento/Reservar/{{$asiento->id}}" class="btn btn-success ">Entendido</a>
                            </div>
                            </div>
                        </div>
                    </div>

                    @guest

                    <!-- trigercito para modal-->
                    <center>
                    <button type="button" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Reservar</button>
                    </center>
                    </th>

                    @else

                    <center>
                        <a href="/Asiento/Reservar/{{$asiento->id}}" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal2" >Reservar</a>
                    </center>

                    @endguest

                    </tr>
                        @endforeach
                        </table>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>

@endsection

