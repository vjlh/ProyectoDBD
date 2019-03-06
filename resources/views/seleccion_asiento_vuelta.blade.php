@extends('layouts.base')
@section('content')
@include('includes.registrarse')


<form action="/Asiento/resasVuelta" method="PATCH">

<section id="intro">
<div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Asientos disponibles') }}</div>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Selección</h5></th>
                    <th><h5 class="card-title">Número</h5></th>
                    <th><h5 class="card-title">Letra</h5></th>
                    <th><h5 class="card-title">Precio</h5></th>
                    <th><h5 class="card-title">Cabina</h5></th>

                    </tr>


                    @foreach($asientos as $asiento)

                    <tr>
                    <th><input type="checkbox" onchange="limite()"class="form-check-input" id="{{$asiento->id}}" name="{{$asiento->id}}" style="margin-left:5%;">
                    <script>
                        function limite(){
                            var pasajeros="<?php echo $num_pasajeros; ?>";
                            $('input[type=checkbox]').on('change', function (e) {
                            if ($('input[type=checkbox]:checked').length > pasajeros) {
                                $(this).prop('checked', false);
                            }
                        });
                        }
                    </script></th>
                    <th><h5 class="card-title">{{$asiento->numero_asiento}}</h5></th>
                    <th><h5 class="card-title">{{$asiento->letra_asiento}}</h5></th>    
                    <th><h5 class="card-title">{{$asiento->precio_asiento}}</h5></th>
                    <th><h5 class="card-title">{{$asiento->cabina}}</h5></th>
                    </tr>
                    @endforeach

                    <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>

                    @guest

                    <!-- trigercito para modal-->
                    <center>
                    <button type="button" class="btn btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Reservar</button>
                    </center>
                    </th>

                    @else

                    <center>
                        <input type="hidden" value="{{$tipo_vuelo}}" name="tipoVuelo" id="tipoVuelo">
                        <input type="hidden" value="{{$fecha_vuelta}}" name="fecha_vuelta" id="fecha_vuelta">
                        <input type="hidden" value="{{$origen}}" name="origen" id="origen">
                        <input type="hidden" value="{{$destino}}" name="destino" id="destino">
                        <input type="hidden" value="{{$num_pasajeros}}" name="num_pasajeros", id="num_pasajeros">
                        <input type="hidden" value="{{$vuelo->id}}" name="id_vuelo", id="id_vuelo">
                        <button type="submit" class="btn btn-get-started scrollto">Reservar</button>
                    </center>

                    @endguest

                    </tr>
                        
                        </table>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>

@endsection

