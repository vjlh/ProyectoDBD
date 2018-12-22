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
        $user = User::create($request->all());
        $user->save();
        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function edit(User $user)
    {
        //
    }

    public function update(UsersRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return "Se ha eliminado el usuario de la DB";
    }
}
