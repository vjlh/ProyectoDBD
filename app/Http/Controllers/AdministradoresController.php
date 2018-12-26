<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;
use App\Http\Requests\AdministradoresRequest;

class AdministradoresController extends Controller
{
    //Probada
    public function index()
    {
        return Administrador::all();
    }

    public function create()
    {
        //
    }

    public function store(AdministradoresRequest $request)
    {
        try{
            $id_user = $request->get('id_user');
            \App\User::find($id_user)->id;

            $administrador = Administrador::create($request->all());
            $administrador->save();
            return $administrador;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
            $administrador = Administrador::find($id);
            if ($administrador != NULL)
                return $administrador;
            else   
                return "No existe un administrador con esa id";    
        
    }

    public function edit(Administrador $administrador)
    {
        //
    }

    public function update(AdministradoresRequest $request, $id)
    {
        $administrador = Administrador::find($id);
        try{
            $id_user = $request->get('id_user');
            \App\User::find($id_user)->id;

            $administrador->fill($request->all());
            $administrador->save();
            return $administrador;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        
        $administrador = Administrador::find($id);

        if($administrador != NULL){
            $administrador->delete();
            Administrador::destroy($id);
            return "El Administrador ha sido eliminado de la DB";
        }
        else
            return "No existe un administardor con el id ingresado";
        
    }
}
