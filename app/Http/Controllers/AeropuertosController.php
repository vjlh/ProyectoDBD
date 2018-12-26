<?php

namespace App\Http\Controllers;

use App\Aeropuerto;
use Illuminate\Http\Request;
use App\Http\Requests\AeropuertosRequest;

class AeropuertosController extends Controller
{
    //Probado
    public function index()
    {
        return Aeropuerto::all();
    }

    public function create()
    {
        //
    }

    public function store(AeropuertosRequest $request)
    {
        try{
            $id_ciudad = $request->get('id_ciudad');
            \App\Ciudad::find($id_ciudad)->id;

            $aeropuerto = Aeropuerto::create($request->all());
            $aeropuerto->save();
            return $aeropuerto;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $aeropuerto = Aeropuerto::find($id);
       
        if($aeropuerto != NULL)
            return $aeropuerto;
        else 
            return "No existe un aeropuerto con la id ingresada";
    }

    public function edit(Aeropuerto $aeropuerto)
    {
        //
    }

    public function update(AeropuertosRequest $request, $id)
    {
        $aeropuerto = Aeropuerto::find($id);
        try{
            $id_ciudad = $request->get('id_ciudad');
            \App\Ciudad::find($id_ciudad)->id;

            $aeropuerto->fill($request->all());
            $aeropuerto->save();
            return $aeropuerto;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $aeropuerto = Aeropuerto::find($id);
        if($aeropuerto != NULL){
            $aeropuerto->delete();
            Aeropuerto::destroy($id);
            return "El aeropuerto se ha eliminado";
        }
        else
            return "No existe un aeropuerto con la id ingresada";
    }
}
