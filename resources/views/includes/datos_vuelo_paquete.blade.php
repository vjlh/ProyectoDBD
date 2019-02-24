<?php
    use App\Vuelo;
    $vueloIda = Vuelo::find($paquete->id_vuelo_ida);
    $vueloVuelta = Vuelo::find($paquete->id_vuelo_vuelta);
?>
<div class="modal fade" id="ModalDatosVueloPaquete" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
        <div class="modal-body" style="color: white;">
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
            </div>
            <div class="modal-body" style="color: white;">
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
            </div>
        <div class="modal-footer">
        <button style="margin: 0 auto;" type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
            </div>
        </div>
        </div>
    </div>