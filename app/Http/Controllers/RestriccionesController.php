<?php

namespace App\Http\Controllers;

use App\Restriccion;
use Illuminate\Http\Request;
use App\Http\Requests\RestriccionesRequest;

class RestriccionesController extends Controller
{
    //Probado
    public function index()
    {
        $restriccion = Restriccion::all();
        return $restriccion;
    }

    public function create()
    {
        //
    }

    public function store(RestriccionesRequest $request)
    {
        try{
            $id_ciudad = $request->get('id_ciudad');
            \App\Ciudad::find($id_ciudad)->id;

            $restriccion = Restriccion::create($request->all());
            $restriccion->save();
            return $restriccion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $restriccion = Restriccion::find($id);
        if($restriccion != NULL)
            return $restriccion;
        else 
            return "La restriccion con el id ingresado no existe o fue eliminada"; 
            
    }

    public function edit(Restriccion $restriccion)
    {
        //
    }

    public function update(RestriccionesRequest $request, $id)
    {
        $restriccion = Restriccion::find($id);
        try{
            $id_ciudad = $request->get('id_ciudad');
            \App\Ciudad::find($id_ciudad)->id;

            $restriccion->fill($request->all());
            $restriccion->save();
            return $restriccion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $restriccion = Restriccion::find($id);
        if($restriccion != NULL)
        {
            $restriccion->delete();
            Restriccion::destroy($id);
            return "Se ha eliminado la restriccion de la DB";
        }
        
        else 
            return "La restricción con el id ingresado no existe o fue eliminada"; 

    }
}
