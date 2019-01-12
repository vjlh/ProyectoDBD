<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Habitacion_ReservaRequest;
use App\Habitacion_Reserva;

class Habitacion_ReservaController extends Controller
{
    //Probado
    public function index()
    {
        return Habitacion_Reserva::all();
    }

    public function create()
    {
        //
    }

    public function store(Habitacion_ReservaRequest $request)
    {
        try{
            $id_habitacion = $request->get('id_habitacion');
            \App\Habitacion::find($id_habitacion)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $hab_res = Habitacion_Reserva::create($request->all());
            $hab_res->save();
            return $hab_res;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $hab_res = Habitacion_Reserva::find($id);
        
        if($hab_res != NULL)
            return $hab_res;
        else 
            return "No existe un hab_res con la id ingresada";
    }

    public function edit(Habitacion_Reserva $hab_res)
    {
        //
    }

    public function update(Habitacion_ReservaRequest $request, $id)
    {
        $hab_res = Habitacion_Reserva::find($id);
        try{
            $id_habitacion = $request->get('id_habitacion');
            \App\Habitacion::find($id_habitacion)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $hab_res->fill($request->all());
            $hab_res->save();
            return $hab_res;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $hab_res = Habitacion_Reserva::find($id);
        if($hab_res != NULL){
            $hab_res->delete();
            Habitacion_Reserva::destroy($id);
            return "La hab_res se ha eliminado";
        }
        else
            return "No existe un hab_res con la id ingresada";
    }
}
