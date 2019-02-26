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
                    <center><div class="card-header">Los beneficios que desea incorporar a su seguro son los siguientes</div></center>
                    
                    <div class="card-body">
                        <table class="table">
                            <thead >
                                <tr>
                                    <th scope="col">Beneficio</th>
                                    <th scope="col">Costo</th>
                                </tr>
                            <thead>
                            <tbody>
                                @foreach ($seguros_seleccionados as $seguros)
                                <tr>
                                    <td>{{$seguros->nombre_beneficio}}</td>
                                    <td>${{$seguros->precio_beneficio}}</td>
                                </tr>
                                @endforeach   
                                <tr>
                                    <th>Costo total del seguro</th>
                                    <td>${{session()->get('costoFinal_seguro')}}</td>
                                </tr> 
                            </tbody>
                        </table>
                        <center>
                        <a href="/" class="btn btn-success btn-get-started scrollto">Reservar Seguro</a>
                        <a href="{{ URL::previous() }}" class="btn btn-success btn-get-started scrollto">Regresar</a>
                        </center>
                    </div>     
                </div>
            </div>
        </div>    
    </div>
</div>




@endsection