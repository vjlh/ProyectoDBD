<!-- Modal -->

<form action="/Transporte/{{ $transporte->id }}" method="post">
@method('PATCH')
@csrf
    <div class="modal fade" id="modal-transporte-update{{$transporte->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Editando Vehículo Nº: {{$transporte->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body" style="color: black;">
                        
                <div class="form-group row">
                    <label 
                    for="precio" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Precio') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="precio" 
                        name="precio" 
                        type="number"
                        min="0"
                        class="form-control"  
                        value="{{ $transporte->precio }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label 
                    for="patente_transporte" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Patente') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="patente_transporte" 
                        name="patente_transporte" 
                        type="number"
                        class="form-control"  
                        value="{{ $transporte->patente_transporte }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>
                <div class="form-group row">
                  <label 
                  for="disponibilidad" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Disponibilidad') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="disponibilidad"
                        name="disponibilidad"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        @if($transporte->disponibilidad == 1)
                        <option value="{{ $transporte->disponibilidad }}" selected>
                          Sí
                        </option>
                        @endif
                        @if($transporte->disponibilidad == 0)
                        <option value="{{ $transporte->disponibilidad }}" selected>
                          No
                        </option>
                        @endif
                        </option>
                        <option value="1">
                          Sí
                        </option>
                        <option value="0">
                          No
                        </option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label 
                    for="precio" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Modelo') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="modelo_transporte" 
                        name="modelo_transporte" 
                        type="text"
                        class="form-control"  
                        value="{{ $transporte->modelo_transporte }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="num_asientos_transporte" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Nº de Asientos') }}
                  </label>

                  <div class="col-md-6">
                      <input 
                        id="num_asientos_transporte" 
                        name="num_asientos_transporte" 
                        type="number" 
                        class="form-control"  
                        value="{{ $transporte->num_asientos_transporte }}"
                        min="1"
                        max="8"
                        required 
                        autofocus
                      >
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="num_puertas_transporte" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Nº de Puertas') }}
                  </label>

                  <div class="col-md-6">
                      <input 
                        id="num_puertas_transporte" 
                        name="num_puertas_transporte" 
                        type="number" 
                        class="form-control"  
                        value="{{ $transporte->num_puertas_transporte }}"
                        min="1"
                        max="6"
                        required 
                        autofocus
                      >
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="aire_acondicionado_transporte" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Aire Acondicionado') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="aire_acondicionado_transporte"
                        name="aire_acondicionado_transporte"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        @if($transporte->aire_acondicionado_habitacion == 1)
                        <option value="{{ $transporte->aire_acondicionado_transporte }}" selected>
                          Sí
                        </option>
                        @endif
                        @if($transporte->aire_acondicionado_habitacion == 0)
                        <option value="{{ $transporte->aire_acondicionado_transporte }}" selected>
                          No
                        </option>
                        @endif
                        <option value="1">
                          Sí
                        </option>
                        <option value="0">
                          No
                        </option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="puntuacion_transporte" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Puntuación') }}
                  </label>

                  <div class="col-md-6">
                      <input 
                        id="puntuacion_transporte" 
                        name="puntuacion_transporte" 
                        type="number" 
                        class="form-control"  
                        value="{{ $transporte->puntuacion_transporte }}"
                        min="1"
                        max="6"
                        required 
                        autofocus
                      >
                  </div>
                </div>


                <div class="modal-footer">
          <button type="submit" class="btn btn-get-started">Editar</button>
          <button type="button" class="btn btn-get-eliminar" data-dismiss="modal">Cancelar</button>
        </div>
            </div>
    </div>
    </div>
</form>
