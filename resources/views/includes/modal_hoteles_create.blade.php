<!-- Modal -->

<form action="{{ route('Hospedaje.store')}}" method="post">
@method('POST')
            @csrf
  <div class="modal fade" id="modal-hospedaje-create" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Agregando Hotel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body" style="color: black;">
                        
            <div class="form-group row">
                  <label 
                  for="ubicacion" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Ubicación') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="ubicacion"
                        name="ubicacion"
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
                    for="nombre_hospedaje" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Nombre') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="nombre_hospedaje" 
                        name="nombre_hospedaje" 
                        type="text"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="cadena_hospedaje" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Cadena') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="cadena_hospedaje" 
                        name="cadena_hospedaje" 
                        type="text"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="cantidad_disponible" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Disponibilidad') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="cantidad_disponible" 
                        name="cantidad_disponible" 
                        type="number"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="estrellas_hospedaje" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Estrellas') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="estrellas_hospedaje" 
                        name="estrellas_hospedaje" 
                        type="number"
                        min="1"
                        max="6"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>
                

                <div class="form-group row">
                  <label 
                  for="estacionamiento_hospedaje" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Estacionamiento') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="estacionamiento_hospedaje"
                        name="estacionamiento_hospedaje"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
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
                  for="piscina_hospedaje" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Piscina') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="piscina_hospedaje"
                        name="piscina_hospedaje"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
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
                  for="sauna_hospedaje" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Sauna') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="sauna_hospedaje"
                        name="sauna_hospedaje"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
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
                  for="zona_infantil_hospedaje" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Zona Infantil') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="zona_infantil_hospedaje"
                        name="zona_infantil_hospedaje"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
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
                  for="gimnasio_hospedaje" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Gimnasio') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="gimnasio_hospedaje"
                        name="gimnasio_hospedaje"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        <option value="1">
                          Sí
                        </option>
                        <option value="0">
                          No
                        </option>
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
