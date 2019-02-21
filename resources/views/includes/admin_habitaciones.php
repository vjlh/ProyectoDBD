   
        
            <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small>HABITACIONES</h1></small>
            </center>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de Habitación</h5></th>
                    <th><h5 class="card-title">Precio</h5></th>
                    <th><h5 class="card-title">Capacidad</h5></th>
                    <th><h5 class="card-title">Tipo</h5></th>
                    <th><h5 class="card-title">Nº de Hotel</h5></th>
                    <th><h5 class="card-title">Editar</h5></th>
                    <th><h5 class="card-title">Eliminar</h5></th>

                    </tr>
                    
                    @foreach($habitaciones as $habitacion)

                    <tr>
                    

                    <th><h5 class="card-title">{{$habitacion->id}}</h5></th>
                    <th><h5 class="card-title">{{$habitacion->precio}}</h5></th>
                    <th><h5 class="card-title">{{$habitacion->capacidad_habitacion}}</h5></th>
                    <th><h5 class="card-title">{{$habitacion->tipo}}</h5></th>
                    <th><h5 class="card-title">{{$habitacion->id_hospedaje}}</h5></th>


                    
                    @guest
                    <!-- Trigger the modal with a button -->

                    @else
                    <form action="/Habitacion/{{$habitacion->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-started ">Editar</button></th>
                    </center>
                    </form>
                    
                    <form action="/Habitacion/{{$habitacion->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-eliminar " >Eliminar</button></th>
                    </center>
                    </form>

                    @endguest




                    </tr>

                    @endforeach

                    </table>


                </div>

            </div>
            