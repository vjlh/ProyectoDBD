   
        
            <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small> VUELOS</h1></small>
                
                <th><button type="submit" class="btn btn-get-started" data-toggle="modal" data-target="#modal-vuelo-create">Agregar</button></th>
                @include('includes.modal_vuelo_create')
            </center>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de Vuelo</h5></th>
                    <th><h5 class="card-title">Origen</h5></th>
                    <th><h5 class="card-title">Destino</h5></th>
                    <th><h5 class="card-title">Hora</h5></th>
                    <th><h5 class="card-title">Fecha</h5></th>
                    <th><h5 class="card-title">Duración</h5></th>
                    <th><h5 class="card-title">Nº de Avión</h5></th>
                    <th><h5 class="card-title">Editar</h5></th>
                    <th><h5 class="card-title">Eliminar</h5></th>

                    </tr>

                    @foreach($vuelos as $vuelo)
                    
                    <tr>
                    

                    <th><h5 class="card-title">{{$vuelo->id}}</h5></th>
                    <th><h5 class="card-title">{{$vuelo->origen_vuelo}}</h5></th>
                    <th><h5 class="card-title">{{$vuelo->destino_vuelo}}</h5></th>
                    <th><h5 class="card-title">{{$vuelo->hora_vuelo}}</h5></th>
                    <th><h5 class="card-title">{{$vuelo->fecha_vuelo}}</h5></th>
                    <th><h5 class="card-title">{{$vuelo->duracion_vuelo}}</h5></th>
                    <th><h5 class="card-title">{{$vuelo->id_avion}}</h5></th>


                    
                    @guest
                    <!-- Trigger the modal with a button -->

                    @else
                    

                    <center>
                    <th><button type="submit" class="btn btn-get-started" data-toggle="modal" data-target="#modal-vuelo-update{{$vuelo->id}}">Editar</button></th>
                    </center>
                    @include('includes.modal_vuelo_edit')

                    </form>
                    
                    <form action="/Vuelo/{{$vuelo->id}}" method="post">
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
                    {!!$vuelos->render()!!}
                    </center>

                </div>

            </div>
            