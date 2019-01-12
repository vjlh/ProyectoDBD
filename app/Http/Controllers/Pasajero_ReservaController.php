<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Pasajero_ReservaRequest;
use App\Pasajero_Reserva;

class Pasajero_ReservaController extends Controller
{
    //Probado
    public function index()
    {
        return Pasajero_Reserva::all();
    }

    public function create()
    {
        //
    }

    public function store(Pasajero_ReservaRequest $request)
    {
        try{
            $id_pasajero = $request->get('id_pasajero');
            \App\Pasajero::find($id_pasajero)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $pas_res = Pasajero_Reserva::create($request->all());
            $pas_res->save();
            return $pas_res;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $pas_res = Pasajero_Reserva::find($id);
        
        if($pas_res != NULL)
            return $pas_res;
        else 
            return "No existe un pas_res con la id ingresada";
    }

    public function edit(Pasajero_Reserva $pas_res)
    {
        //
    }

    public function update(Pasajero_ReservaRequest $request, $id)
    {
        $pas_res = Pasajero_Reserva::find($id);
        try{
            $id_pasajero = $request->get('id_pasajero');
            \App\Pasajero::find($id_pasajero)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $pas_res->fill($request->all());
            $pas_res->save();
            return $pas_res;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $pas_res = Pasajero_Reserva::find($id);
        if($pas_res != NULL){
            $pas_res->delete();
            Pasajero_Reserva::destroy($id);
            return "La pas_res se ha eliminado";
        }
        else
            return "No existe un pas_res con la id ingresada";
    }
}
