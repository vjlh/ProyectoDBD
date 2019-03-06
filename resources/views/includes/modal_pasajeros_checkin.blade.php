<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<form action="{{ route('Pasajero.store')}}" method="post">
@method('POST')
            @csrf
    <div class="modal fade" id="ModalPasajero" role="dialog">
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
                        <select id="pais_pasajero" class="form-control">
                            <option selected>Seleccionar Pais</option>
                            @foreach($paises as $pais)
                            <option value ="{{$pais->nombre_pais}}">{{$pais->nombre_pais}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>

                <script>
                    $("#edad_pasajero").on("change",function(){
                        var edad = document.getElementById("edad_pasajero").value;
                        var tipo = "";
                        if(edad<=5){
                            tipo = "Bebé";
                        }
                        else if(edad>5 && edad<=18){
                            tipo = 'Joven'
                        }
                        else if(edad>18 && edad<=50){
                            tipo = 'Adulto'
                        }
                        else{
                            tipo = 'Adulto Mayor'
                        }
                        document.getElementById("tipo_pasajero").value = tipo;
                    });

                </script>

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
                            value="" 
                            required >
                    </div>
                </div>
                

                <div class="form-group row">
                    <label 
                    for="tipo_pasajero" 
                    class="col-sm-4 col-form-label text-md-right">
                    {{ __('Tipo') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="tipo_pasajero" 
                        name="tipo_pasajero" 
                        type="text"
                        class="form-control"
                        placeholder="Tipo Pasajero"
                        disabled  
                        required>
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
                                required>
                        </div>
                    </div>
                </div>

        

                <center><button type="submit" class="btn btn-get-started">Terminar</button></center>
            </div>
                </div>
        </div>
    </div>
</form>
