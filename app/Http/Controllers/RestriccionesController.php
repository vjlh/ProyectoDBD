<?php

namespace App\Http\Controllers;

use App\Restriccion;
use Illuminate\Http\Request;
use App\Http\Requests\RestriccionesRequest;

class RestriccionesController extends Controller
{

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

            $restriccion = Ciudad::create($request->all());
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
        return $restriccion;
    }

    public function edit(Restriccion $restriccion)
    {
        //
    }

    public function update(RestriccionesRequest $request, $id)
    {
        $restriccion = Ciudad::find($id);
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
        $restriccion->delete();
        return "Se ha eliminado la restriccion de la DB";
    }
}
