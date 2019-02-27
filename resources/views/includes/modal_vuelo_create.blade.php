<!-- Modal -->

<form action="{{ route('Vuelo.store')}}" method="post">
@method('POST')
            @csrf
    <div class="modal fade" id="modal-vuelo-create" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Agregando Vuelo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body" style="color: black;">
                        
                <div class="form-group row">
                    <label 
                    for="hora_vuelo" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Hora') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="hora_vuelo" 
                        name="hora_vuelo" 
                        type="time"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="duracion_vuelo" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Duración') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="duracion_vuelo" 
                        name="duracion_vuelo" 
                        type="time"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="fecha_vuelo" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Fecha') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="fecha_vuelo" 
                        name="fecha_vuelo" 
                        type="date"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="origen_vuelo" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Origen') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="origen_vuelo"
                        name="origen_vuelo"
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
                  for="destino_vuelo" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Destino') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="destino_vuelo"
                        name="destino_vuelo"
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
                  for="id_avion" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Id Avión') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="id_avion"
                        name="id_avion"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        
                          @foreach ($aviones as $avioncito)
                          <option value="{{ $avioncito->id }}">
                              {{$avioncito->id}}
                          </option>
                          @endforeach 
                          
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="id_aeropuerto" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Id Aeropuerto') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="id_aeropuerto"
                        name="id_aeropuerto"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        
                          @foreach ($aeropuertos as $aeropuertito)
                          <option value="{{ $aeropuertito->id }}">
                              {{$aeropuertito->id}}
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
