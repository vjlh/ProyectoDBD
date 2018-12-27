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

            $habitacion = Hospedaje::create($request->all());
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
        if($habitacion != NULL)
            return $habitacion;
        else
            return "La habitación con el id ingresado no existe o fue eliminado";     
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
        $habitacion = Habitacion::find($id);
        if($habitacion != NULL)
        {
            $habitacion->delete();
            Habitacion::destroy($id);
            return "Se ha eliminado la habitacion de la DB";
        }
        else
            return "La habitacion con el id ingresado no existe o fue eliminado"; 
    }
}
