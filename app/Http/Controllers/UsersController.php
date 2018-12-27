<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

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

    public function update(UsersRequest $request, $id)
    {
        $now = date('Y-m-d H:i:s');
        $user = User::find($id);
        $user->fill($request->all());
        $user->email_verified_at = $now;
        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user!=NULL)
        {
            $user->delete();
            User::destroy($id);
            return "Se ha eliminado el usuario de la DB";
        }
        
        else
            return "El usuario con el id ingresado no existe o fue eliminado"; 
    }
}
