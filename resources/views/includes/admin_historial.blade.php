

<div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small>HISTORIAL DEL SISTEMA</h1></small>
                

            </center>


                <div class="card-body">

                    <table class="table table-hover table-striped">
                    <tr>
                    
                    <th><h5 class="card-title">Nº de Actividad</h5></th>
                    <th><h5 class="card-title">Nº de Usuario</h5></th>
                    <th><h5 class="card-title">Descripción</h5></th>
                    <th><h5 class="card-title">Fecha</h5></th>


                    </tr>

                    @foreach($historiales as $historial)

                    <tr>
                    

                    <th><h5 class="card-title">{{$historial->id}}</h5></th>
                    <th><h5 class="card-title">{{$historial->id_user}}</h5></th>
                    <th><h5 class="card-title">{{$historial->descripcion}}</h5></th>
                    <th><h5 class="card-title">{{$historial->created_at}}</h5></th>


                    
                 



                    </tr>

                    @endforeach

                    </table>

                    <center>
                    {!!$historiales->render()!!}
                    </center>


                </div>

            </div>

