<form action="{{ route('Pasajero.update',$pasajero_actual->id)}}" method="post">
@method('PATCH')
            @csrf
    <div class="modal fade" id="ModalPasajeroEdit{{$count}}" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5  style="color: black;" class="modal-title" id="exampleModalCenterTitle">Completando datos de pasajero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

                <div class="modal-body" style="color: black;">
                            
                    <div class="form-group row">
                        <label 
                            for="nombre_pasajero" 
                            class="col-sm-4 col-form-label text-md-right">
                            {{ __('Nombre') }}
                        </label>
                        

                        <div class="col-md-6">
                            <input 
                            id="nombre_pasajero" 
                            name="nombre_pasajero" 
                            type="text"
                            class="form-control"  
                            placeholder="Nombre Pasajero" 
                            value = "{{$pasajero_actual->nombre_pasajero}}" 
                            autofocus
                            required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label 
                            for="apellido_pasajero" 
                            class="col-sm-4 col-form-label text-md-right">
                            {{ __('Apellido') }}
                        </label>

                        <div class="col-md-6">
                            <input 
                            id="apellido_pasajero" 
                            name="apellido_pasajero" 
                            type="text"
                            class="form-control" 
                            placeholder="Apellido Pasajero" 
                            value = "{{$pasajero_actual->apellido_pasajero}}" 
                            autofocus
                            required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label 
                            for="rut_pasajero" 
                            class="col-sm-4 col-form-label text-md-right">
                            {{ __('Rut') }}
                        </label>

                        <div class="col-md-6">
                            <input 
                            id="rut_pasajero" 
                            name="rut_pasajero" 
                            type="text"
                            class="form-control" 
                            placeholder="Rut Pasajero"
                            value = "{{$pasajero_actual->rut_pasajero}}" 
                            autofocus
                            required >
                        </div>
                    </div>
                    <?php
                    use App\Pais;
                    $paises = Pais::all()->sortBy('nombre_pais');
                    ?>
                    <div class="form-group row">
                        <label for="pais_pasajero" class="col-sm-4 col-form-label text-md-right"> {{ __('Pais') }}</label>
                        <div class="col-md-6">
                            <select 
                            id="pais_pasajero" 
                            name="pais_pasajero" 
                            class="form-control selectpicker custom-select"
                            required 
                            autofocus>
                                <option value="{{$pasajero_actual->pais_pasajero}}"  selected> {{$pasajero_actual->pais_pasajero}}</option>
                                @foreach($paises as $pais)
                                <option value ="{{$pais->nombre_pais}}">{{$pais->nombre_pais}}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label 
                        for="edad_pasajero" 
                        class="col-sm-4 col-form-label text-md-right">
                        {{ __('Edad') }}
                        </label>

                        <div class="col-md-6">
                            <input 
                                id="edad_pasajero" 
                                name="edad_pasajero" 
                                type="number" 
                                class="form-control"  
                                min="1"
                                max="100"
                                placeholder="Edad Pasajero" 
                                value = "{{$pasajero_actual->edad_pasajero}}" 
                                autofocus
                                required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label 
                        for="correo_pasajero" 
                        class="col-sm-4 col-form-label text-md-right">
                        {{ __('Correo') }}
                        </label>

                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input 
                                    id="correo_pasajero" 
                                    name="correo_pasajero" 
                                    type="email"
                                    class="form-control"
                                    placeholder="Correo Pasajero"
                                    value = "{{$pasajero_actual->correo_pasajero}}" 
                                    autofocus
                                    required>
                            </div>
                        </div>
                    </div>
                    
                    <center><button type="submit" class="btn btn-get-started">Terminar</button>
                    <button type="button" class="btn btn-get-eliminar" data-dismiss="modal">Cancelar</button></center>
                </div>
            </div>
        </div>
    </div>
</form>
