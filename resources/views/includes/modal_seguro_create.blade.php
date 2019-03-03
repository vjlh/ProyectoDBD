<!-- Modal -->

<form action="{{ route('Beneficio.store')}}" method="post">
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
                    for="nombre_beneficio" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Tipo') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="nombre_beneficio" 
                        name="nombre_beneficio" 
                        type="text"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="descripcion_beneficio" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Descripción') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="descripcion_beneficio" 
                        name="descripcion_beneficio" 
                        type="text"
                        class="form-control"  
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="precio_beneficio" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Precio') }}
                  </label>

                  <div class="col-md-6">
                      <input 
                        id="precio_beneficio" 
                        name="precio_beneficio" 
                        type="number" 
                        class="form-control"  
                        min="1"
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
