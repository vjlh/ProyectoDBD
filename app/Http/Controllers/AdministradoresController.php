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
use App\Ciudad;
use App\Avion;
use App\Aeropuerto;
use App\Beneficio;
use App\Historial;

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
        $vuelos = Vuelo::paginate(10);
        $hospedajes = Hospedaje::paginate(10);
        $seguros = Seguro::paginate(10);
        $paquetes = Paquete::paginate(10);
        $transportes = Transporte::paginate(10);
        $habitaciones = Habitacion::paginate(10);
        $ciudades = Ciudad::paginate(10);
        $aviones = Avion::paginate(10);
        $aeropuertos = Aeropuerto::paginate(10);
        $beneficios = Beneficio::paginate(10);
        $historiales = Historial::paginate(10);
        $usuarios = User::paginate(10);


        return view('admin',compact('usuarios','vuelos','hospedajes','seguros','paquetes','transportes','habitaciones','ciudades','aviones','aeropuertos','beneficios','historiales'));
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
