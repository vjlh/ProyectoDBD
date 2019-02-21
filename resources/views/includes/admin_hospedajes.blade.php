

            <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small> HOTELES</h1></small>
            </center>
                <div class="card-header">{{ __('') }}</h5></div>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de Hotel</h5></th>
                    <th><h5 class="card-title">Nombre</h5></th>
                    <th><h5 class="card-title">Cadena</h5></th>
                    <th><h5 class="card-title">Disponibilidad</h5></th>
                    <th><h5 class="card-title">Ubicación</h5></th>
                    <th><h5 class="card-title">Estrellas</h5></th>
                    <th><h5 class="card-title">Editar</h5></th>
                    <th><h5 class="card-title">Eliminar</h5></th>

                    </tr>

                    @foreach($hospedajes as $hospedaje)

                    <tr>
                    

                    <th><h5 class="card-title">{{$hospedaje->id}}</h5></th>
                    <th><h5 class="card-title">{{$hospedaje->nombre_hospedaje}}</h5></th>
                    <th><h5 class="card-title">{{$hospedaje->cadena_hospedaje}}</h5></th>
                    <th><h5 class="card-title">{{$hospedaje->ubicacion}}</h5></th>
                    <th><h5 class="card-title">{{$hospedaje->cantidad_disponible}}</h5></th>
                    <th><h5 class="card-title">{{$hospedaje->estrellas_hospedaje}}</h5></th>


                    
                    @guest
                    <!-- Trigger the modal with a button -->

                    @else
                    <form action="/Hospedaje/{{$hospedaje->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-started">Editar</button></th>
                    </center>
                    </form>
                    
                    <form action="/Hospedaje/{{$hospedaje->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-eliminar">Eliminar</button></th>
                    </center>
                    </form>

                    @endguest




                    </tr>

                    @endforeach

                    </table>

                        </div>
                </div>

            </div>
