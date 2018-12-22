<?php

namespace App\Http\Controllers;

use App\Vuelo;
use Illuminate\Http\Request;
use App\Http\Requests\VuelosRequest;

class VuelosController extends Controller
{

    public function index()
    {
        $vuelo = Vuelo::all();
        return $vuelo;
    }

    public function create()
    {
        //
    }

    public function store(VuelosRequest $request)
    {
        try{
            $id_avion = $request->get('id_avion');
            \App\Avion::find($id_avion)->id;
            $id_aeropuerto = $request->get('id_aeropuerto');
            \App\Aeropuerto::find($id_aeropuerto)->id;

            $vuelo = Vuelo::create($request->all());
            $vuelo->save();
            return $vuelo;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $vuelo = Vuelo::find($id);
        return $vuelo;
    }

    public function edit(Vuelo $vuelo)
    {
        //
    }

    public function update(VuelosRequest $request, $id)
    {
        $vuelo = Vuelo::find($id);
        try{
            $id_avion = $request->get('id_avion');
            \App\Avion::find($id_avion)->id;
            $id_aeropuerto = $request->get('id_aeropuerto');
            \App\Aeropuerto::find($id_aeropuerto)->id;

            $vuelo->fill($request->all());
            $vuelo->save();
            return $vuelo;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $vuelo = Vuelo::find($id);
        $vuelo->delete();
        return "Se ha eliminado el vuelo de la DB";
    }
}
