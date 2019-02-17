@extends('layouts.base')
@section('content')




<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
            <center>
                <h1><small> CARRITO DE COMPRAS</h1></small>
            </center>
                <div class="card-header">{{ __('') }}</h5></div>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de reserva</h5></th>
                    <th><h5 class="card-title">Monto total</h5></th>
                    <th><h5 class="card-title">Tipo</h5></th>
                    <th><h5 class="card-title">Comprar</h5></th>

                    </tr>

                    @foreach($reservas as $reserva)

                    <tr>

                    <th><h5 class="card-title">{{ $reserva->id }}</h5></th>
                    <th><h5 class="card-title">{{$reserva->monto_total_reserva}}</h5></th>

                    @if($reserva->vuelo == 1)
                    <th><h5 class="card-title"></h5>Vuelo</th>
                    @endif
                    @if($reserva->hospedaje == 1)
                    <th><h5 class="card-title"></h5>Hospedaje</th>
                    @endif
                    @if($reserva->transporte == 1)
                    <th><h5 class="card-title"></h5>Transporte</th>
                    @endif

                    
                    @guest
                    <!-- Trigger the modal with a button -->
                    <center>
                    <th><button type="button" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Comprar</button></th>
                    </center>
                

                    @else

                    <center>
                        
                    <th><button type="submit" class="btn btn-get-started scrollto">Comprar</button></th>
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


@endsection
