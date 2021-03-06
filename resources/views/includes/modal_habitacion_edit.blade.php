<!-- Modal -->

<form action="{{ route('Habitacion.update', $habitacion->id)}}" method="post">
@method('PATCH')
            @csrf
    <div class="modal fade" id="modal-habitacion-update{{$habitacion->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Editando Habitación Nº: {{$habitacion->id}}</h5>
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
                        min="1"
                        class="form-control"  
                        value="{{ $habitacion->precio }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="capacidad_habitacion" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Capacidad') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="capacidad_habitacion" 
                        name="capacidad_habitacion" 
                        type="number"
                        min="1"
                        class="form-control"  
                        value="{{ $habitacion->capacidad_habitacion }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                  <label 
                  for="banio_privado" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Baño privado') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="banio_privado"
                        name="banio_privado"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        @if($habitacion->banio_privado == 1)
                        <option value="{{ $habitacion->banio_privado }}" selected>
                          Sí
                        </option>
                        @endif
                        @if($habitacion->banio_privado == 0)
                        <option value="{{ $habitacion->banio_privado }}" selected>
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
                  for="aire_acondicionado_habitacion" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Aire acondicionado') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="aire_acondicionado_habitacion"
                        name="aire_acondicionado_habitacion"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        @if($habitacion->aire_acondicionado_habitacion == 1)
                        <option value="{{ $habitacion->aire_acondicionado_habitacion }}" selected>
                          Sí
                        </option>
                        @endif
                        @if($habitacion->aire_acondicionado_habitacion == 0)
                        <option value="{{ $habitacion->aire_acondicionado_habitacion }}" selected>
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
                  for="disponibilidad" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Disponibilidad ') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="disponibilidad"
                        name="disponibilidad"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        @if($habitacion->disponibilidad == 1)
                        <option value="{{ $habitacion->disponibilidad }}" selected>
                          Sí
                        </option>
                        @endif
                        @if($habitacion->disponibilidad == 0)
                        <option value="{{ $habitacion->disponibilidad }}" selected>
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
                        <option value="{{ $habitacion->id_hospedaje }}" selected>
                          {{ $habitacion->id_hospedaje }}
                        </option>
                        
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
                  for="tipo" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Tipo') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="tipo"
                        name="tipo"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        <option value="{{ $habitacion->tipo }}" selected>
                          {{ $habitacion->tipo }}
                        </option>
                          <option value="VIP ">
                              VIP
                          </option>
                          <option value="Suite ">
                              Suite
                          </option>
                          <option value="Economica ">
                              Economica
                          </option>
                          <option value="Luxury ">
                              Luxury
                          </option>
                          <option value="Premium ">
                              Premium
                          </option>
                    </select>
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
