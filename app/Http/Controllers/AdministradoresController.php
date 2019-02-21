<?php

namespace App\Http\Controllers;


use App\User;
use App\Vuelo;
use App\Hospedaje;
use App\Seguro;
use App\Administrador;
use App\Paquete;
use App\Transporte;
use App\Habitacion;

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
        $vuelos = Vuelo::all();
        return view('admin',compact('vuelos'));
    }

    public function f1()
    {
        $vuelos = Vuelo::all();
        $hospedajes = Hospedaje::all();
        $seguros = Seguro::all();
        $paquetes = Paquete::all();
        $transportes = Transporte::all();
        $habitaciones = Habitacion::all();
        return view('admin',compact('vuelos','hospedajes','seguros','paquetes','transportes','habitaciones'));
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
