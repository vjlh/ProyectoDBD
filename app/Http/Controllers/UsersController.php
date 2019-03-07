<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Historial;

class UsersController extends Controller
{

    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function create()
    {
        //
    }

    public function store(UsersRequest $request)
    {
        $now = date('Y-m-d H:i:s');
        $user = new User;
        $user->fill($request->all());
        $user->email_verified_at = $now;
        $user->save();
        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        if($user!=NULL)
            return $user;
        else
            return "El usuario con el id ingresado no existe o fue eliminado"; 
                
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        
        $outcome = $usuario->fill($this->validate($request, [
            'name' => 'required',
            'apellido_usuario' => 'required',
            'fecha_nacimiento' => 'required',
            'num_documento_usuario' => 'required',
            'pais_usuario' => 'required',
            'administrador' => 'required',
            'email' => 'required',
        ]))->save();

        $historial = new Historial;
        $historial->id_user=auth()->id();
        $historial->descripcion="Ha editado el usuario Nº" .$usuario->id;
        $historial->save();

        if ($outcome) {
            //dd("aqui");
            return back()->with('success_message','Actualizado con éxito!');
        } else {
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');
            //dd("aqui2");
        }
        
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        if($usuario!=NULL)
        {
            $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha eliminado al usuario Nº" .$usuario->id;
            $historial->save();

            $usuario->delete();
            User::destroy($id);

            
            return back()->with('success_message','Se ha eliminado el usuario con éxito!');
        }
        else
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');
        }

    }
