<?php

namespace App\Http\Controllers;

use App\Equipaje;
use Illuminate\Http\Request;
use App\Http\Requests\EquipajesRequest;

class EquipajesController extends Controller
{

    public function index()
    {
        return Equipaje::all();
    }

    public function create()
    {
        //
    }

    public function store(EquipajesRequest $request)
    {
        try{
            $id_pasajero = $request->get('id_pasajero');
            \App\Pasajero::find($id_pasajero)->id;

            $equipaje = Equipaje::create($request->all());
            $equipaje->save();
            return $equipaje;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $equipaje = Equipaje::find($id);
        return $equipaje;
    }

    public function edit(Equipaje $equipaje)
    {
        //
    }

    public function update(EquipajesRequest $request, $id)
    {
        $equipaje = Equipaje::find($id);
        try{
            $id_pasajero = $request->get('id_pasajero');
            \App\Pasajero::find($id_pasajero)->id;

            $equipaje->fill($request->all());
            $equipaje->save();
            return $equipaje;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        Equipaje::find($id)->delete();
        return "Se ha eliminado el equipaje de la DB";
    }
}
