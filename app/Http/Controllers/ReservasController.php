<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;
use App\Http\Requests\ReservasRequest;

class ReservasController extends Controller
{
    //Probado
    public function index()
    {
        $reserva = Reserva::all();
        return $reserva;
    }

    public function create()
    {
        //
    }

    public function store(ReservasRequest $request)
    {
        try{
            $id_paquete = $request->get('id_paquete');
            \App\Paquete::find($id_paquete)->id;
            $id_seguro = $request->get('id_seguro');
            \App\Seguro::find($id_seguro)->id;
            $id_promocion = $request->get('id_promocion');
            \App\Promocion::find($id_promocion)->id;
            $id_user = $request->get('id_user');
            \App\User::find($id_user)->id;
            $id_asiento = $request->get('id_asiento');
            \App\Asiento::find($id_asiento)->id;

            $reserva = Reserva::create($request->all());
            $reserva->save();
            return Reserva::all();
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        if($reserva != NULL)
            return $reserva;
        else
            return "La reserva con el id ingresado no existe o fue eliminada"; 
    }

    public function edit(Reserva $reserva)
    {
        //
    }

    public function update(ReservasRequest $request, $id)
    {
        $reserva = Reserva::find($id);
        try{
            $id_paquete = $request->get('id_paquete');
            \App\Paquete::find($id_paquete)->id;
            $id_seguro = $request->get('id_seguro');
            \App\Seguro::find($id_seguro)->id;
            $id_promocion = $request->get('id_promocion');
            \App\Promocion::find($id_promocion)->id;

            $reserva->fill($request->all());
            $reserva->save();
            return $reserva;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        if($reserva!=NULL)
        {
            $reserva->delete();
            Reserva::destroy($id);
            return "Se ha eliminado la reserva de la DB";
        }
        else
            return "La reserva con el id ingresado no existe o fue eliminada"; 

    }
}
