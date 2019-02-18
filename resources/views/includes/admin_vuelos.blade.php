   
        
            <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small> VUELOS</h1></small>
            </center>
                <div class="card-header">{{ __('') }}</h5></div>

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
                    <form action="/Vuelo/{{$vuelo->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-started scrollto">Editar</button></th>
                    </center>
                    </form>
                    
                    <form action="/Vuelo/{{$vuelo->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-started scrollto" style ="background: red;">Eliminar</button></th>
                    </center>
                    </form>

                    @endguest




                    </tr>

                    @endforeach

                    </table>

                        </div>
                </div>

            </div>
            