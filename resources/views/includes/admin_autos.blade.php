 

        <div class="form">
            <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small>AUTOMÓVILES</h1></small>
            
            
            <th><button type="submit" class="btn btn-get-started" data-toggle="modal" data-target="#modal-transporte-create">Agregar</button></th>
            @include('includes.modal_transporte_create')
            </center>
            
                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de Automóvil</h5></th>
                    <th><h5 class="card-title">Precio</h5></th>
                    <th><h5 class="card-title">Patente</h5></th>
                    <th><h5 class="card-title">Modelo</h5></th>
                    <th><h5 class="card-title">Nº de asientos</h5></th>
                    <th><h5 class="card-title">Nº de puertas</h5></th>
                    <th><h5 class="card-title">Ubicación</h5></th>
                    <th><h5 class="card-title">Editar</h5></th>
                    <th><h5 class="card-title">Eliminar</h5></th>

                    </tr>

                    @foreach($transportes as $transporte)
                    @include('includes.modal_transporte_edit')
                    <tr>
                    

                    <th><h5 class="card-title">{{$transporte->id}}</h5></th>
                    <th><h5 class="card-title">{{$transporte->precio}}</h5></th>
                    <th><h5 class="card-title">{{$transporte->patente_transporte}}</h5></th>
                    <th><h5 class="card-title">{{$transporte->modelo_transporte}}</h5></th>
                    <th><h5 class="card-title">{{$transporte->num_asientos_transporte}}</h5></th>
                    <th><h5 class="card-title">{{$transporte->num_puertas_transporte}}</h5></th>
                    <th><h5 class="card-title">{{$transporte->ubicacion}}</h5></th>


                    
                    @guest
                    <!-- Trigger the modal with a button -->

                    @else

                    <center>
                    <th><button type="submit" class="btn btn-get-started" data-toggle="modal" data-target="#modal-transporte-update{{$transporte->id}}">Editar</button></th>
                    </center>
                    
                    </form>
                    
                    <form action="/Transporte/{{$transporte->id}}" method="post">
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
                    <center>
                    {!!$transportes->render()!!}
                    </center>
                </div>

            </div>
        </div>

        
       

