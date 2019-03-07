   
        
<div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
<center>
    <h1><small> USUARIOS</h1></small>
    

</center>

    <div class="card-body">

        <table class="table table-hover table-striped">
        <tr>
        
        <th><h5 class="card-title">Nº de Usuario</h5></th>
        <th><h5 class="card-title">Nombre</h5></th>
        <th><h5 class="card-title">Fecha nacimiento</h5></th>
        <th><h5 class="card-title">Administrador</h5></th>
        <th><h5 class="card-title">País</h5></th>
        <th><h5 class="card-title">Editar</h5></th>
        <th><h5 class="card-title">Eliminar</h5></th>

        </tr>

        @foreach($usuarios as $usuario)
        
        <tr>
        

        <th><h5 class="card-title">{{$usuario->id}}</h5></th>
        <th><h5 class="card-title">{{$usuario->name}}</h5></th>
        <th><h5 class="card-title">{{$usuario->fecha_nacimiento}}</h5></th>
        @if($usuario->administrador == 1)
            <th><h5 class="card-title">Sí</h5></th>
        @endif
        @if($usuario->administrador == 0)
            <th><h5 class="card-title">No</h5></th>
        @endif
        <th><h5 class="card-title">{{$usuario->pais_usuario}}</h5></th>


        
        @guest
        <!-- Trigger the modal with a button -->

        @else
        

        <center>
        <th><button type="submit" class="btn btn-get-started" data-toggle="modal" data-target="#modal-usuario-update{{$usuario->id}}">Editar</button></th>
        </center>
        @include('includes.modal_usuario_edit')

        </form>
        
        <form action="/User/{{$usuario->id}}" method="post">
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
