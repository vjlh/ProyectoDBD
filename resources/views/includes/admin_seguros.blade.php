


<div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small>SEGUROS</h1></small>
            </center>
                <div class="card-header">{{ __('') }}</h5></div>

                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de Seguro</h5></th>
                    <th><h5 class="card-title">Precio Seguro</h5></th>
                    <th><h5 class="card-title">Tipo</h5></th>
                    <th><h5 class="card-title">Editar</h5></th>
                    <th><h5 class="card-title">Eliminar</h5></th>

                    </tr>

                    @foreach($seguros as $seguro)

                    <tr>
                    

                    <th><h5 class="card-title">{{$seguro->id}}</h5></th>
                    <th><h5 class="card-title">{{$seguro->precio_seguro}}</h5></th>
                    <th><h5 class="card-title">{{$seguro->tipo_seguro}}</h5></th>


                    
                    @guest
                    <!-- Trigger the modal with a button -->

                    @else
                    <form action="/seguro/{{$seguro->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <center>
                    <th><button type="submit" class="btn btn-get-started scrollto">Editar</button></th>
                    </center>
                    </form>
                    
                    <form action="/seguro/{{$seguro->id}}" method="post">
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
            