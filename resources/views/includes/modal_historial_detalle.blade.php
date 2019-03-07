<!-- En caso de ser vuelo -->
<?php
    use App\Paquete;
    use App\Seguro;
    use App\Vuelo;
    use App\Hospedaje;
    use App\Habitacion;
    use App\Transporte;
    use App\Asiento_Vuelo;
    use App\Habitacion_Reserva;
    use App\Transporte_Reserva;
    use App\Beneficio_Seguro;
    use App\Beneficio;
    use Carbon\Carbon;
?>

@if($reserva->id_paquete != NULL)
<?php

    $paquete = Paquete::find($reserva->id_paquete);
    $vueloIda = Vuelo::find($paquete->id_vuelo_ida);
    $vueloVuelta = Vuelo::find($paquete->id_vuelo_vuelta);

    if($paquete->tipo_paquete == 'Alojamiento'){
        $tipo = 'Vuelo + Alojamiento';
    } elseif($paquete->tipo_paquete == 'Automóvil'){
        $tipo = 'Vuelo + Automóvil';
    } elseif($paquete->tipo_paquete == 'All'){
        $tipo = 'Vuelo + Alojamiento + Automóvil';
    }

    setlocale(LC_TIME, 'es_ES.UTF-8'); 
    Carbon::setLocale('es'); 
    $fecha_inicial1 = Carbon::parse($paquete->fecha_paquete);
    $fecha_fin1 = Carbon::parse($paquete->fecha_paquete)->addDays($paquete->num_dias);


    $fecha_inicio = $fecha_inicial1->formatLocalized('%d %B %Y');
    $fecha_fin = $fecha_fin1->formatLocalized('%d %B %Y');
?>
<div class="modal fade" id="ModalHistorialDetalle{{$reserva->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
            <div class="modal-body" style="color: white;">

                <div class="card-header">Detalles del paquete</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Destino</th>
                            <td>{{$paquete->destino_paquete}}</td>
                        </tr>
                        <tr>
                            <th>Paquete incluye:</th>
                            <td>{{$tipo}}</td>
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
                            <th>Fecha de partida:</th>
                            <td>{{$fecha_inicio}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de regreso:</th>
                            <td>{{$fecha_fin}}</td>
                        </tr>
                        <tr>
                            <th>Precio del paquete:</th>
                            <td>${{$paquete->precio_paquete}}/Pers.</td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-header">Vuelo de ida</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Origen:</th>
                            <td>{{$vueloIda->origen_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Destino:</th>
                            <td>{{$vueloIda->destino_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Hora de partida:</th>
                            <td>{{$vueloIda->hora_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Duración del vuelo:</th>
                            <td>{{$vueloIda->duracion_vuelo}}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-header">Vuelo de regreso</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Origen:</th>
                            <td>{{$vueloVuelta->origen_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Destino:</th>
                            <td>{{$vueloVuelta->destino_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Hora de partida:</th>
                            <td>{{$vueloVuelta->hora_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Duración del vuelo:</th>
                            <td>{{$vueloVuelta->duracion_vuelo}}</td>
                        </tr>
                    </tbody>
                </table>
                
                @if($paquete->tipo_paquete == "Alojamiento" || $paquete->tipo_paquete == "All")

                <?php
                    $hospedaje = Hospedaje::find($paquete->id_hospedaje);
                    $habitacion = Habitacion::find($paquete->id_habitacion);

                    if($hospedaje->estacionamiento_hospedaje == true){$estacionamientoHospedaje = 'Si';}
                    else{$estacionamientoHospedaje = 'No';}
                    if($hospedaje->piscina_hospedaje == true){$piscinaHospedaje = 'Si';}
                    else{$piscinaHospedaje = 'No';}
                    if($hospedaje->sauna_hospedaje == true){$saunaHospedaje = 'Si';}
                    else{$saunaHospedaje = 'No';}
                    if($hospedaje->zona_infantil_hospedaje == true){$infantilHospedaje = 'Si';}
                    else{$infantilHospedaje = 'No';}
                    if($hospedaje->gimnasio_hospedaje == true){$gimnasioHospedaje = 'Si';}
                    else{$gimnasioHospedaje = 'No';}

                    if($habitacion->banio_privado == true){$banio = 'Si';}
                    else{$banio = 'No';}
                    if($habitacion->aire_acondicionado_habitacion == true){$aire = 'Si';}
                    else{$aire = 'No';}
                ?>
                <div class="card-header">Datos del hospedaje</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Nombre hotel:</th>
                            <td>{{$hospedaje->nombre_hospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Estrellas:</th>
                            <td>{{$hospedaje->estrellas_hospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Estacionamiento:</th>
                            <td>{{$estacionamientoHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Piscina:</th>
                            <td>{{$piscinaHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Sauna:</th>
                            <td>{{$saunaHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Zona infantil:</th>
                            <td>{{$infantilHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Gimnasio:</th>
                            <td>{{$gimnasioHospedaje}}</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
                
                <div class="card-header">Datos de la habitación</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Capacidad:</th>
                            <td>{{$habitacion->capacidad_habitacion}} Pers.</td>
                        </tr>
                        <tr>
                            <th>Tipo:</th>
                            <td>{{$habitacion->tipo}}</td>
                        </tr>
                        <tr>
                            <th>Baño privado:</th>
                            <td>{{$banio}}</td>
                        </tr>
                        <tr>
                            <th>Aire acondicionado:</th>
                            <td>{{$aire}}</td>
                        </tr>
                    </tbody>
                </table>
                @endif
 
                @if($paquete->tipo_paquete == "Automóvil" || $paquete->tipo_paquete == "All" )
                <?php
                $transporte = Transporte::find($paquete->id_transporte);

                if($transporte->aire_acondicionado_transporte == true){$aire = 'Si';}
                else{$aire = 'No';}
                ?>
                <div class="card-header">Datos del transporte</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Modelo:</th>
                            <td>{{$transporte->modelo_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Patente:</th>
                            <td>{{$transporte->patente_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Puntuación:</th>
                            <td>{{$transporte->puntuacion_transporte}} Estrellas</td>
                        </tr>
                        <tr>
                            <th>Número de asientos:</th>
                            <td>{{$transporte->num_asientos_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Número de puertas:</th>
                            <td>{{$transporte->num_puertas_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Aire acondicionado:</th>
                            <td>{{$aire}}</td>
                        </tr>
                    </tbody>
                </table>
                @endif
                <div class="modal-footer">
                    <button style="margin: 0 auto;" type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif($reserva->id_seguro != NULL)

<?php
    $seguro = Seguro::find($reserva->id_seguro);
    $beneficios_seguro = Beneficio_Seguro::all()->where('id_seguro','=',$seguro->id);
    $ids = [];
    foreach($beneficios_seguro as $b_s){
        array_push($ids,$b_s->id_beneficio);
    }
    $beneficios = Beneficio::all()->whereIn('id',$ids);
?>
<div class="modal fade" id="ModalHistorialDetalle{{$reserva->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
        <div class="modal-body" style="color: white;">
                <div class="card-header">Datos del seguro</div>
                    <table class="table" style="background-color: #2c3e50d9;" >
                        <tbody>
                        <tr>
                            <th>Tipo de seguro:</th>
                            <td>{{$seguro->tipo_seguro}}</td>
                        </tr>
                        <tr>
                            <th>Numero de personas que cubre el seguro:</th>
                            <td>{{$seguro->numero_pasajeros_seguros}}</td>
                        </tr>
                        
                        <tr>
                            <th>Destino del seguro:</th>
                            <td>{{$seguro->destino_seguro}}</td>
                        </tr>
                        <tr>
                            <th>Fecha inicio</th>
                            <td>{{$seguro->fecha_inicio_seguro}}</td>
                        </tr>
                        <tr>
                            <th>Fecha termino</th>
                            <td>{{$seguro->fecha_fin_seguro}}</td>
                        </tr>
                        <tr>
                            <th>Costo</th>
                            <td>{{$seguro->precio_seguro}}</td>
                        </tr>
                        </tbody>
                    </table>

                <div class="card-header">Beneficios que incluye</div>
                    <table class="table table-sm" style="background-color: #2c3e50d9;" >
                        <tbody>
                            @foreach ($beneficios as $beneficio)
                            <tr>
                                <td>{{$beneficio->nombre_beneficio}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
        <button style="margin: 0 auto;" type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
            </div>
        </div>
        </div>
    </div>


@elseif($reserva->hospedaje == true)

<?php
        $habitacion_reserva = Habitacion_Reserva::where('id_reserva',$reserva->id)->first();
        $habitacion = Habitacion::find($habitacion_reserva->id_habitacion);
        $hospedaje = Hospedaje::find($habitacion->id_hospedaje);

        if($hospedaje->estacionamiento_hospedaje == true){$estacionamientoHospedaje = 'Si';}
        else{$estacionamientoHospedaje = 'No';}
        if($hospedaje->piscina_hospedaje == true){$piscinaHospedaje = 'Si';}
        else{$piscinaHospedaje = 'No';}
        if($hospedaje->sauna_hospedaje == true){$saunaHospedaje = 'Si';}
        else{$saunaHospedaje = 'No';}
        if($hospedaje->zona_infantil_hospedaje == true){$infantilHospedaje = 'Si';}
        else{$infantilHospedaje = 'No';}
        if($hospedaje->gimnasio_hospedaje == true){$gimnasioHospedaje = 'Si';}
        else{$gimnasioHospedaje = 'No';}
        if($habitacion->banio_privado == true){$banio = 'Si';}
        else{$banio = 'No';}
        if($habitacion->aire_acondicionado_habitacion == true){$aire = 'Si';}
        else{$aire = 'No';}
?>
<div class="modal fade" id="ModalHistorialDetalle{{$reserva->id}}" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
        <div class="modal-body" style="color: white;">
            <div class="card-header">Datos del hospedaje</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Nombre hotel:</th>
                            <td>{{$hospedaje->nombre_hospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Estrellas:</th>
                            <td>{{$hospedaje->estrellas_hospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Estacionamiento:</th>
                            <td>{{$estacionamientoHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Piscina:</th>
                            <td>{{$piscinaHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Sauna:</th>
                            <td>{{$saunaHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Zona infantil:</th>
                            <td>{{$infantilHospedaje}}</td>
                        </tr>
                        <tr>
                            <th>Gimnasio:</th>
                            <td>{{$gimnasioHospedaje}}</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
                <div class="card-header">Datos de la habitación</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Capacidad:</th>
                            <td>{{$habitacion->capacidad_habitacion}} Pers.</td>
                        </tr>
                        <tr>
                            <th>Tipo:</th>
                            <td>{{$habitacion->tipo}}</td>
                        </tr>
                        <tr>
                            <th>Baño privado:</th>
                            <td>{{$banio}}</td>
                        </tr>
                        <tr>
                            <th>Aire acondicionado:</th>
                            <td>{{$aire}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="modal-footer">
        <button style="margin: 0 auto;" type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
            </div>
        </div>
        </div>
    </div>

@elseif($reserva->transporte == true)

<?php
    $transporte_reserva = DB::table('transportes_reservas')->where('id_reserva','=',$reserva->id)->first();
    $transporte = Transporte::find($transporte_reserva->id_transporte);

    if($transporte->aire_acondicionado_transporte == true){$aire = 'Si';}
    else{$aire = 'No';}
?>
<div class="modal fade" id="ModalHistorialDetalle{{$reserva->id}}" role="dialog">
    <div class="modal-dialog  ">
        <div class="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
        <div class="modal-body" style="color: white;">
            <div class="card-header">Datos del transporte</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Modelo:</th>
                            <td>{{$transporte->modelo_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Patente:</th>
                            <td>{{$transporte->patente_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Puntuación:</th>
                            <td>{{$transporte->puntuacion_transporte}} Estrellas</td>
                        </tr>
                        <tr>
                            <th>Número de asientos:</th>
                            <td>{{$transporte->num_asientos_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Número de puertas:</th>
                            <td>{{$transporte->num_puertas_transporte}}</td>
                        </tr>
                        <tr>
                            <th>Aire acondicionado:</th>
                            <td>{{$aire}}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
        <button style="margin: 0 auto;" type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
            </div>
        </div>
        </div>
    </div>

@elseif($reserva->vuelo == true)

<?php
    $asiento_vuelo = Asiento_Vuelo::All()->where('id_reserva','=',$reserva->id)->first();
    $vuelo = Vuelo::find($asiento_vuelo->id_vuelo);
?>
<div class="modal fade" id="ModalHistorialDetalle{{$reserva->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
        <div class="modal-body" style="color: white;">
            <div class="card-header">Vuelo de ida</div>
                <table class="table" style="background-color: #2c3e50d9;" >
                    <tbody>
                        <tr>
                            <th>Origen:</th>
                            <td>{{$vuelo->origen_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Destino:</th>
                            <td>{{$vuelo->destino_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Hora de partida:</th>
                            <td>{{$vuelo->hora_vuelo}}</td>
                        </tr>
                        <tr>
                            <th>Duración del vuelo:</th>
                            <td>{{$vuelo->duracion_vuelo}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="modal-footer">
        <button style="margin: 0 auto;" type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
            </div>
        </div>
        </div>
    </div>

@endif

