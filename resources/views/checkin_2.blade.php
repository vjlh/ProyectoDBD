@extends('layouts.base')
@section('content')

<?php
if (session()->get('numPasajero_CheckIn')== NULL){
    session()->put('numPasajero_CheckIn', 0); 
    $contador = 0;
}
else
    $contador = session()->get('numPasajero_CheckIn');

echo"<script>console.log('contador: $contador')</script>";        
      
?>

<!--==========================
    Intro Section
  ============================-->
<?php
use Carbon\Carbon;
use App\Pasajero;
setlocale(LC_TIME, 'es_ES.UTF-8'); 
Carbon::setLocale('es'); 
$fecha = Carbon::parse($vuelo->fecha_vuelo)->formatLocalized('%d %B %Y');

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <section id="intro">
        <div class="carousel-background"><img src="{{asset('images/1.jpg')}}" alt=""></div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card dbd-auth" style="margin-top: -60%; color: white; background-color: #212529c7;">
                        <div class="card-header">{{ __('Codigo de reserva: ') }} {{$cod_obtenido}}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">                        
                                        <label style="font-family:WildWest;font-size:200%">{{$vuelo->origen_vuelo}}</label> 
                                        <i class="material-icons" style="font-size:200%;color:orange;">flight_takeoff</i>
                                        <label style="font-family:WildWest;font-size:200%">  {{$vuelo->destino_vuelo}}</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="font-family:Trebuchet MS;font-size:130%">{{$user->name}} {{$user->apellido_usuario}}</label>
                                    </div>    
                                </div>
                                
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>
                                            <i class="material-icons" style="font-size:170%;color:orange;">date_range</i>
                                            Fecha del vuelo</th>

                                            <td>{{$fecha}} </td>
                                        </tr>
                                        <tr>
                                            <th>
                                            <i class="material-icons" style="font-size:170%;color:orange;">watch_later</i>
                                            Hora del vuelo</th>
                                            <td>
                                                {{$vuelo->hora_vuelo}} 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                
                                <i class="material-icons" style="font-size:200%;color:orange;">event_seat</i>
                                <label>Asientos reservados</label>
                                <?php
                                    $count = 0;
                                ?>
                                <table class="table table-sm">
                                    <tbody>
                                        @foreach ($asientos as $asiento)
                                        <?php
                                            $count++;
                                        ?>
                                        <tr>
                                            <td>
                                                {{$count}} - {{$asiento->cabina}}
                                            </td>
                                            <td>
                                                {{$asiento->letra_asiento}} {{$asiento->numero_asiento}}
                                            </td>
                                            <td>
                                            <?php
                                            if(session()->get('pasajerosId_CheckIn')!=null){
                                                $ids_pasajeros = session()->get('pasajerosId_CheckIn');
                                                $id = array_get($ids_pasajeros,$count-1);
                                                $pasajero_actual = Pasajero::find($id);
                                                echo"<script>console.log('contador: $contador')</script>";        
                                                
                                            }
                                            else{
                                                $pasajero_actual = Pasajero::all()->last();

                                            }
                                            if($count>$contador){
                                                $opcion = 1;
                                            }
                                            else{
                                                $opcion = 0;
                                            }
                                            ?>

                                            @if($count>$contador)
                                            @include('includes.modal_pasajeros_checkin')

                                            
                                            <a class="btn btn-success btn-get-started scrollto" style="margin-left:30%" data-toggle="modal" data-target="#ModalPasajero{{$count}}" >Ingresar datos del pasajero</a>
                                            @else
                                            @include('includes.modal_pasajeros_checkin_edit')

                                            <a class="btn btn-success btn-get-started scrollto" style="margin-left:30%" data-toggle="modal" data-target="#ModalPasajeroEdit{{$count}}" >Editar datos del pasajero</a>
                                            @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <?php
                                $numero_asientos = $asientos->count();
                                echo"<script>console.log('numero asientos: $numero_asientos')</script>";        

                                ?>
                                <input type="hidden" value="{{$cod_obtenido}}" name="codigo_reserva", id="codigo_reserva">   
                                <div class="form-group row mb-0">
                                     <div class="col-md-6 offset-md-4">
                                    @if($numero_asientos == $contador)
                                        <a href="/Reserva/Check-in/{{$cod_obtenido}}" class="btn btn-get-started scrollto">Realizar Check-in</a>
                                    @else
                                        <button type="button" disabled class="btn btn-get-started scrollto">Realizar Check-in</button>                                        
                                    @endif    

                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection