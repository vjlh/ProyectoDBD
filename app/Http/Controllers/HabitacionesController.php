<?php

namespace App\Http\Controllers;

use App\Habitacion;
use Illuminate\Http\Request;
use App\Http\Requests\HabitacionesRequest;

class HabitacionesController extends Controller
{

    public function index()
    { 
        return Habitacion::all();
    }

    public function create()
    {
        //
    }

    public function store(HabitacionesRequest $request)
    {
        try{
            $id_hospedaje = $request->get('id_hospedaje');
            \App\Hospedaje::find($id_hospedaje)->id;

            $habitacion = Avion::create($request->all());
            $habitacion->save();
            return $habitacion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        return $habitacion;
    }

    public function edit(Habitacion $habitacion)
    {
        //
    }

    public function update(HabitacionesRequest $request, $id)
    {
        $habitacion = Habitacion::find($id);
        try{
            $id_hospedaje = $request->get('id_hospedaje');
            \App\Hospedaje::find($id_hospedaje)->id;

            $habitacion->fill($request->all());
            $habitacion->save();
            return $habitacion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        Habitacion::find($id)->delete();
        return "Se ha eliminado la habitacion de la DB";
    }
}
