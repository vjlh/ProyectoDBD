@extends('layouts.app')
@section('content')
@include('includes.carousel')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<div class="content" style="padding: 50px;">
    <div class="flex-center position-ref">
        <div class="card card_compra text-white bg-primary mb-3 border-success" style="top: -155px; background-color: #2c3e50d9 !important;">
            <h2><div class="card-header">Detalle del paquete seleccionado</div></h2>
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
             <button type="button" style="margin-top:40px;text-align:center;height:60px;width:200px" class="btn btn-success" data-toggle="modal" data-target="#myModal">Reservar</button>
             
            @include('includes.registrarse')

            @else

            <a href="/Paquete/Reservar/{{$paquete->id}}" style="margin-top:40px;text-align:center;height:60px;width:200px"class="btn btn-success">Reservar</a>
            
            @endguest  

                
            </div>       
        </div>
    </div>
</div>

@endsection