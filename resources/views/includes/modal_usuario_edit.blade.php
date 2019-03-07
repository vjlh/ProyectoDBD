<!-- Modal -->

<form action="{{ route('User.update', $usuario->id)}}" method="post">
@method('PATCH')
            @csrf
    <div class="modal fade" id="modal-usuario-update{{$usuario->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Editando Usuario Nº: {{$usuario->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body" style="color: black;">
                        
                <div class="form-group row">
                    <label 
                    for="name" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Nombre') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="name" 
                        name="name" 
                        type="text"
                        class="form-control"  
                        value="{{ $usuario->name }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="apellido_usuario" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Apellido') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="apellido_usuario" 
                        name="apellido_usuario" 
                        type="text"
                        class="form-control"  
                        value="{{ $usuario->apellido_usuario }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>

              

                <div class="form-group row">
                    <label 
                    for="fecha_nacimiento" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Fecha nacimiento') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="fecha_nacimiento" 
                        name="fecha_nacimiento" 
                        type="date"
                        class="form-control"  
                        value="{{ $usuario->fecha_nacimiento }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="num_documento_usuario" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Número documento') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="num_documento_usuario" 
                        name="num_documento_usuario" 
                        type="number"
                        class="form-control"  
                        value="{{ $usuario->num_documento_usuario }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label 
                    for="pais_usuario" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('País') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="pais_usuario" 
                        name="pais_usuario" 
                        type="text"
                        class="form-control"  
                        value="{{ $usuario->pais_usuario }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>
                
                <div class="form-group row">
                  <label 
                  for="administrador" 
                  class="col-sm-4 col-form-label text-md-right"
                  >
                    {{ __('Administrador') }}
                  </label>
                <div class="col-md-6">
                    <select 
                        id="administrador"
                        name="administrador"
                        class="form-control selectpicker custom-select" 
                        required 
                        autofocus
                        >
                        @if($usuario->administrador == 1)
                        <option value="{{ $usuario->administrador }}" selected>
                          Sí
                        </option>
                        @endif
                        @if($usuario->administrador == 0)
                        <option value="{{ $usuario->administrador }}" selected>
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
                    for="email" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('E-mail') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="email" 
                        name="email" 
                        type="email"
                        class="form-control"  
                        value="{{ $usuario->email }}" 
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
