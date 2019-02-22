   
        
            <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small>PAQUETES</h1></small>
                <th><button type="submit" class="btn btn-get-started" data-toggle="modal" data-target="#modal-transporte-create">Agregar</button></th>
                
            </center>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de Paquete</h5></th>
                    <th><h5 class="card-title">Nº de días</h5></th>
                    <th><h5 class="card-title">Nº de noches</h5></th>
                    <th><h5 class="card-title">Precio</h5></th>
                    <th><h5 class="card-title">Destino</h5></th>
                    <th><h5 class="card-title">Editar</h5></th>
                    <th><h5 class="card-title">Eliminar</h5></th>

                    </tr>

                    @foreach($paquetes as $paquete)

                    <tr>
                    

                    <th><h5 class="card-title">{{$paquete->id}}</h5></th>
                    <th><h5 class="card-title">{{$paquete->num_dias}}</h5></th>
                    <th><h5 class="card-title">{{$paquete->num_noches}}</h5></th>
                    <th><h5 class="card-title">{{$paquete->precio_paquete}}</h5></th>
                    <th><h5 class="card-title">{{$paquete->destino_paquete}}</h5></th>


                    
                    @guest
                    <!-- Trigger the modal with a button -->

                    @else
                    <form action="/Paquete/{{$paquete->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-started ">Editar</button></th>
                    </center>
                    </form>
                    
                    <form action="/Paquete/{{$paquete->id}}" method="post">
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
            