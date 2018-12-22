<?php

namespace App\Http\Controllers;

use App\Avion;
use Illuminate\Http\Request;
use App\Http\Requests\AvionesRequest;

class AvionesController extends Controller
{

    public function index()
    {
        return Avion::all();
    }

    public function create()
    {
        //
    }

    public function store(AvionesRequest $request)
    {
        try{
            $id_vuelo = $request->get('id_vuelo');
            \App\Vuelo::find($id_vuelo)->id;

            $avion = Avion::create($request->all());
            $avion->save();
            return $avion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    { 
        return Avion::find($id);
    }

    public function edit(Avion $avion)
    {
        //
    }

    public function update(AvionesRequest $request, $id)
    {
        $avion = Avion::find($id);
        try{
            $id_vuelo = $request->get('id_vuelo');
            \App\Vuelo::find($id_vuelo)->id;

            $avion->fill($request->all());
            $avion->save();
            return $avion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        Avion::find($id)->delete();
        return "El avion se ha eliminado";
    }
}
