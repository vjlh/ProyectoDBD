<?php
    use App\Hospedaje;
    use App\Habitacion;
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
<div class="modal fade" id="ModalDatosHospedajePaquete" role="dialog">
    <div class="modal-dialog modal-sm">
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