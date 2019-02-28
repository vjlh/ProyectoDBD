<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Asiento_VueloRequest;
use App\Asiento_Vuelo;

class Asiento_VueloController extends Controller
{
    //Probado
    public function index()
    {
        return Asiento_Vuelo::all();
    }

    public function create()
    {
        //
    }

    public function store(Asiento_VueloRequest $request)
    {
        try{
            $id_vuelo = $request->get('id_vuelo');
            \App\Vuelo::find($id_vuelo)->id;
            $id_asiento = $request->get('id_asiento');
            \App\Asiento::find($id_asiento)->id;

            $as_vue = Asiento_Vuelo::create($request->all());
            $as_vue->save();
            return $as_vue;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $as_vue = Asiento_Vuelo::find($id);
        
        if($as_vue != NULL)
            return $as_vue;
        else 
            return "No existe un as_vue con la id ingresada";
    }

    public function edit(Asiento_Vuelo $as_vue)
    {
        //
    }

    public function update(Asiento_VueloRequest $request, $id)
    {
        $as_vue = Asiento_Vuelo::find($id);
        try{
            $id_vuelo = $request->get('id_vuelo');
            \App\Vuelo::find($id_vuelo)->id;
            $id_asiento = $request->get('id_asiento');
            \App\Asiento::find($id_asiento)->id;

            $as_vue->fill($request->all());
            $as_vue->save();
            return $as_vue;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $as_vue = Asiento_Vuelo::find($id);
        if($as_vue != NULL){
            $as_vue->delete();
            Asiento_Vuelo::destroy($id);
            return "La as_vue se ha eliminado";
        }
        else
            return "No existe un as_vue con la id ingresada";
    }
}
