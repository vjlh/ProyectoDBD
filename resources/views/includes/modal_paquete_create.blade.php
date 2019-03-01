<!-- Modal -->

<form action="{{ route('Paquete.store')}}" method="post">
@method('POST')
            @csrf
    <div class="modal fade" id="modal-paquete-create" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Agregando Paquete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body" style="color: black;">
              
            <div class="form-group row">
                    <label 
                    for="num_dias" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Nº de días') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="num_dias" 
                        name="num_dias" 
                        type="number"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="num_noches" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Nº de noches') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="num_dnum_nochesias" 
                        name="num_noches" 
                        type="number"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="fecha_paquete" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Fecha') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="fecha_paquete" 
                        name="fecha_paquete" 
                        type="date"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="precio_paquete" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Precio') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="precio_paquete" 
                        name="precio_paquete" 
                        type="number"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="destino_paquete" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Destino') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="destino_paquete"
                        name="destino_paquete"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        
                          @foreach ($ciudades as $ciudadita)
                          <option value="{{ $ciudadita->nombre_ciudad }}">
                              {{$ciudadita->nombre_ciudad}}
                          </option>
                          @endforeach 
                          
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="tipo_paquete" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Tipo') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="tipo_paquete"
                        name="tipo_paquete"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >

                          <option value="Alojamiento ">
                              Alojamiento
                          </option>
                          <option value="Autómovil ">
                              Autómovil
                          </option>
                          <option value="Europa ">
                              All
                          </option>
                          
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="id_vuelo_ida" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Id Vuelo ida') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="id_vuelo_ida"
                        name="id_vuelo_ida"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        
                          @foreach ($vuelos as $vuelito)
                          <option value="{{ $vuelito->id }}">
                              {{$vuelito->id}}
                          </option>
                          @endforeach 
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="id_vuelo_vuelta" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Id Vuelo vuelta') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="id_vuelo_vuelta"
                        name="id_vuelo_vuelta"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                          @foreach ($vuelos as $vuelito)
                          <option value="{{ $vuelito->id }}">
                              {{$vuelito->id}}
                          </option>
                          @endforeach 
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="id_transporte" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Id Transporte') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="id_transporte"
                        name="id_transporte"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        
                          @foreach ($transportes as $transportillo)
                          <option value="{{ $transportillo->id }}">
                              {{$transportillo->id}}
                          </option>
                          @endforeach 
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="id_hospedaje" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Id Hospedaje') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="id_hospedaje"
                        name="id_hospedaje"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        
                          @foreach ($hospedajes as $hospedajito)
                          <option value="{{ $hospedajito->id }}">
                              {{$hospedajito->id}}
                          </option>
                          @endforeach 
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="id_habitacion" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Id Habitación') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="id_habitacion"
                        name="id_habitacion"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        
                          @foreach ($habitaciones as $habitacioncita)
                          <option value="{{ $habitacioncita->id }}">
                              {{$habitacioncita->id}}
                          </option>
                          @endforeach 
                    </select>
                  </div>
                </div>





                <div class="modal-footer">
          
            
            <button type="submit" class="btn btn-get-started">Agregar</button>
          
          <button type="button" class="btn btn-get-eliminar" data-dismiss="modal">Cancelar</button>
        </div>
            </div>
    </div>
    </div>
</form>
