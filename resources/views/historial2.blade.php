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
                            <h1><small> HISTORIAL DE ACTIVIDADES</h1></small>
                        </center>
                        <div class="card-header">{{ __('') }}</h5></div>
                        <div class="card-body">

                            <table class="table table-hover table-striped">
                                <tr> 
                                    <th><h5 class="card-title">Nº de actividad</h5></th>
                                    <th><h5 class="card-title">Descripción</h5></th>
                                    <th><h5 class="card-title">Fecha</h5></th>
                                </tr>


                                @foreach($historiales as $historial)
                                <tr>
                                    <th><h5 class="card-title">{{$historial->id}}</h5></th>
                                    <th><h5 class="card-title">{{$historial->descripcion}}</h5></th>
                                    <th><h5 class="card-title">{{$historial->created_at}}</h5></th>
                                    
                                
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
