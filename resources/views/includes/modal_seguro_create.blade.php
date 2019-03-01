<!-- Modal -->

<form action="{{ route('Seguro.store')}}" method="post">
@method('POST')
            @csrf
  <div class="modal fade" id="modal-seguro-create" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Agregando Seguro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body" style="color: black;">
                        
            <div class="form-group row">
                    <label 
                    for="precio_seguro" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Precio') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="precio_seguro" 
                        name="precio_seguro" 
                        type="number"
                        min="0"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="destino_seguro" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Destino') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="destino_seguro"
                        name="destino_seguro"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >

                          <option value="Africa ">
                              Africa
                          </option>
                          <option value="Asia ">
                              Asia
                          </option>
                          <option value="Europa ">
                              Europa
                          </option>
                          <option value="Norteamerica">
                              Norteamerica
                          </option>
                          <option value=" Centroamerica ">
                              Centroamerica 
                          </option>
                          <option value="Latinoamerica ">
                              Latinoamerica
                          </option>
                          <option value="Oceania ">
                              Oceania
                          </option>
                          
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="tipo_seguro" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Tipo') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="tipo_seguro" 
                        name="tipo_seguro" 
                        type="text"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

             

                <div class="form-group row">
                  <label 
                  for="numero_pasajeros_seguros" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Nº de Pasajeros') }}
                  </label>

                  <div class="col-md-6">
                      <input 
                        id="numero_pasajeros_seguros" 
                        name="numero_pasajeros_seguros" 
                        type="number" 
                        class="form-control"  
                        min="1"
                        max="10"
                        required 
                        autofocus
                      >
                  </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="fecha_inicio_seguro" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Fecha Inicio') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="fecha_inicio_seguro" 
                        name="fecha_inicio_seguro" 
                        type="date"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="fecha_fin_seguro" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Fecha Fin') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="fecha_fin_seguro" 
                        name="fecha_fin_seguro" 
                        type="date"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

            
            <button type="submit" class="btn btn-get-started">Agregar</button>
          
          <button type="button" class="btn btn-get-eliminar" data-dismiss="modal">Cancelar</button>
        </div>
            </div>
    </div>
  </div>
</form>
