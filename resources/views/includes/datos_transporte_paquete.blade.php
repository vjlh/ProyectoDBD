<?php
    use App\Transporte;
    $transporte = Transporte::find($paquete->id_transporte);

    if($transporte->aire_acondicionado_transporte == true){$aire = 'Si';}
    else{$aire = 'No';}
?>
<div class="modal fade" id="ModalDatosTransportePaquete" role="dialog">
    <div class="modal-dialog modal-sm">
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