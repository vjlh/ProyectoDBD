@extends('layouts.base')
@section('content')


<section id="intro">
    <style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
    <section id="about">
        <div class="container" style="margin-top: 10%;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                        
                    <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
                        <center>
                            <h1><small> HISTORIAL DE RESERVAS (COMPRAS)</h1></small>
                        </center>
                        <div class="card-header">{{ __('') }}</h5></div>
                        <div class="card-body">

                            <table class="table table-hover table-striped">
                                <tr> 
                                    <th><h5 class="card-title">Nº de reserva</h5></th>
                                    <th><h5 class="card-title">Monto total</h5></th>
                                    <th><h5 class="card-title">Tipo</h5></th>
                                    <th><h5 class="card-title">Fecha</h5></th>
                                    <th><h5 class="card-title">Detalles</h5></th>
                                </tr>

                                @foreach($reservas as $reserva)
                                <tr>
                                    <th><h5 class="card-title">{{ $reserva->id }}</h5></th>
                                    <th><h5 class="card-title">{{$reserva->monto_total_reserva}}</h5></th>
                                    @if($reserva->id_seguro != NULL)
                                        <th><h5 class="card-title"></h5>Seguro</th>
                                    @elseif($reserva->id_paquete != NULL)
                                        <th><h5 class="card-title"></h5>Paquete</th>
                                    @elseif($reserva->vuelo == 1)
                                        <th><h5 class="card-title"></h5>Vuelo</th>
                                    @elseif($reserva->hospedaje == 1)
                                        <th><h5 class="card-title"></h5>Hospedaje</th>
                                    @elseif($reserva->transporte == 1)
                                        <th><h5 class="card-title"></h5>Transporte</th>
                                    @endif

                                    <th><h5 class="card-title">{{$reserva->created_at}}</h5></th>
                                    
                                    @guest
                                    <!-- Trigger the modal with a button -->
                                    <center>
                                    <th><button type="button" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Comprar</button></th>
                                    </center>
                                
                                    @else
                                    <center>
                                    <th>
                                    @include('includes.modal_historial_detalle')
                                    <a class="btn btn-success btn-get-started scrollto" data-toggle="modal" data-target="#ModalHistorialDetalle{{$reserva->id}}">Detalles</a></th>
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
    </section><!-- #about -->
</section>

@endsection
