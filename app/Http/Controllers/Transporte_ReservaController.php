<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Transporte_reservaRequest;
use App\Transporte_reserva;

class Transporte_ReservaController extends Controller
{
    //Probado
    public function index($id)
    {
        $transporte = Transporte::find($id);
        return view('reservar_auto', compact('reservar_auto'));
    }

    public function create()
    {
        //
    }

    public function store(Transporte_reservaRequest $request)
    {
        $reserva = new Reserva;
        $reserva->monto_total_reserva=271660000;
        $reserva->check_in=null;
        $reserva->id_user=4;
        $reserva->id_seguro=null;
        $reserva->id_promocion=null;
        $reserva->id_paquete=null;
        $reserva->transporte=true;
        $reserva->hospedaje=false;
        $reserva->vuelo=false;
        $reserva->save();


        $res_trans = new Transporte_Reserva;
        $res_trans->id_transporte = $id;
        $res_trans->id_reserva = $reserva->id;
        $res_trans->fecha_inicio = "2019-10-10";
        $res_trans->fecha_fin ="2019-10-10";
        $res_trans->save();
        
        Transporte::all();
        return view('transportes',compact('transportes'));
    }

    public function show($id)
    {
        $transporte = Transporte::find($id);
        $numero_dias = session()->get('diasDiferencia');
        $costoFinal = $numero_dias* $transporte->precio;
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
        $reserva->hospedaje=false;
        $reserva->vuelo=true;
        $reserva->save();


        $res_trans = new Transporte_Reserva;
        $res_trans->id_habitacion = $id;
        $res_trans->id_reserva = $reserva->id;
        $res_trans->fecha_inicio = $fecha_inicio;
        $res_trans->fecha_fin =$fecha_fin;
        $res_trans->save();

        $transporte->disponibilidad = false;
        $transporte->save();
        session()->put('costo_final', $costoFinal);        
        $transportes = Transporte::all();
        return view('detallesReservaTransporte',compact('transporte'));
    }

    public function edit(Transporte_reserva $tran_res)
    {
        //
    }

    public function update(Transporte_reservaRequest $request, $id)
    {
        $tran_res = Transporte_reserva::find($id);
        try{
            $id_transporte = $request->get('id_transporte');
            \App\Transporte::find($id_transporte)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $tran_res->fill($request->all());
            $tran_res->save();
            return $tran_res;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $tran_res = Transporte_reserva::find($id);
        if($tran_res != NULL){
            $tran_res->delete();
            Transporte_reserva::destroy($id);
            return "La tran_res se ha eliminado";
        }
        else
            return "No existe un tran_res con la id ingresada";
    }
}
