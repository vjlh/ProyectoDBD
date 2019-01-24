<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Habitacion_Reserva;
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
        $reserva = new Reserva;
        $reserva->monto_total_reserva=request('total');
        $reserva->check_in=request('check_in');
        $reserva->id_user=request('id_user');
        $reserva->id_seguro=request('id_seguro');
        $reserva->id_promocion=request('id_promocion');
        $reserva->id_paquete=request('id_paquete');
        $reserva->transporte=true;
        $reserva->hospedaje=true;
        $reserva->vuelo=true;
        
    }
    public function reservaHab()
    {
        $reserva = new Reserva;
        $reserva->monto_total_reserva=request('total');
        $reserva->check_in=null;
        $reserva->id_user=request('id_user');
        $reserva->id_seguro=null;
        $reserva->id_promocion=null;
        $reserva->id_paquete=null;
        $reserva->transporte=false;
        $reserva->hospedaje=false;
        $reserva->vuelo=true;

        $res_hab = new Habitacion_Reserva;
        $res_hab->id_habitacion = request('id_habitacion');
        $res_hab->id_reserva = $reserva->id;
        $res_hab->fecha_inicio = "2019-10-10";
        $res_hab->fecha_fin ="2019-10-10";
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
