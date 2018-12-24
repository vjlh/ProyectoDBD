<?php

namespace App\Http\Controllers;

use App\Aeropuerto;
use Illuminate\Http\Request;
use App\Http\Requests\AeropuertosRequest;

class AeropuertosController extends Controller
{
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

            $aeropuerto = Aeropuert::create($request->all());
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
        return $aeropuerto;
    }

    public function edit(Aeropuerto $aeropuerto)
    {
        //
    }

    public function update(Request $request, Aeropuerto $aeropuerto)
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
        Aeropuerto::find($id)->delete();
        return "El aeropuerto se ha eliminado";
    }
}
