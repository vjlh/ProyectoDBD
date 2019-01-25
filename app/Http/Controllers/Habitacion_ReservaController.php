<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Habitacion_ReservaRequest;
use App\Habitacion_Reserva;
use App\Reserva;
use App\Hospedaje;
use App\Habitacion;

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
        
        $reserva = new Reserva;
        $reserva->monto_total_reserva=271660000;
        $reserva->check_in=null;
        $reserva->id_user=4;
        $reserva->id_seguro=null;
        $reserva->id_promocion=null;
        $reserva->id_paquete=null;
        $reserva->transporte=false;
        $reserva->hospedaje=false;
        $reserva->vuelo=true;
        $reserva->save();


        $res_hab = new Habitacion_Reserva;
        $res_hab->id_habitacion = $id;
        $res_hab->id_reserva = $reserva->id;
        $res_hab->fecha_inicio = "2019-10-10";
        $res_hab->fecha_fin ="2019-10-10";
        $res_hab->save();
        
        Hospedaje::all();
        return view('hospedajes',compact('hospedajes'));
    }

    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        $numero_dias = session()->get('diasDiferencia');
        $costoFinal = $numero_dias* $habitacion->precio;
        $fecha_inicio = session()->get('fecha_ida');
        $fecha_fin = session()->get('fecha_vuelta');

        $reserva = new Reserva;
        $reserva->monto_total_reserva=$costoFinal;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_promocion=null;
        $reserva->id_paquete=null;
        $reserva->transporte=false;
        $reserva->hospedaje=true;
        $reserva->vuelo=false;
        $reserva->save();


        $res_hab = new Habitacion_Reserva;
        $res_hab->id_habitacion = $id;
        $res_hab->id_reserva = $reserva->id;
        $res_hab->fecha_inicio = $fecha_inicio;
        $res_hab->fecha_fin =$fecha_fin;
        $res_hab->save();

        $habitacion->disponibilidad = false;
        $habitacion->save();
        session()->put('costo_final', $costoFinal);        
        $hospedajes = Hospedaje::all();
        return view('detallesReservaHospedaje',compact('habitacion'));
    }

    public function edit(Habitacion_Reserva $hab_res)
    {
        //
    }

    public function update($id)
    {
        //
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
