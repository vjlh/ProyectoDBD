<?php

namespace App\Http\Controllers;

use App\Paquete;
use App\Reserva;
use App\Ciudad;
use App\Vuelo;
use App\Asiento;
use App\Hospedaje;
use App\Habitacion;
use App\Transporte;
use App\Transporte_Reserva;
use App\Habitacion_Reserva;
use Illuminate\Http\Request;
use App\Http\Requests\PaquetesRequest;

class PaquetesController extends Controller
{
    //Probado
    public function index()
    {
        return Paquete::all();
    }

    public function create()
    {
        //
    }

    public function store(PaquetesRequest $request)
    {
        $paquete = Paquete::create($request->all());
        $paquete->save();
        return $paquete;
    }
    public function respaq($id){
        $paquete = Paquete::find($id);

        $reserva = new Reserva;
        $reserva->monto_total_reserva=$paquete->precio_paquete;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_promocion=null;
        $reserva->id_paquete=$id;
        $reserva->transporte=false;
        $reserva->hospedaje=false;
        $reserva->vuelo=false;
        $reserva->save();
        
        $ciudades = Ciudad::all();

        return view('home',compact('ciudades'));

    }

    public function show($id)
    { 
        $paquete = Paquete::find($id);
        session()->put('paquete', $paquete);
        return view('detallePaquete',compact('paquete'));
        

    }

    public function edit(Paquete $paquete)
    {
        //
    }

    public function update(PaquetesRequest $request, $id)
    {
        $paquete = Paquete::find($id);
        $paquete->fill($request->all());
        $paquete->save();
        return $paquete;
    }

    public function destroy($id)
    {
        $paquete = Paquete::find($id);
        if($paquete!=NULL)
        {
            $paquete->delete();
            Paquete::destroy($id);
            return "Se ha eliminado el paquete de la DB";
        }
        else
            return "El paquete con el id ingresado no existe o fue eliminado"; 

    }

    public function reservarPaquete($id_paquete, $id_vuelo, $id_extra, $num_pasajeros){
        $paquete = Paquete::find($id_paquete);
        $vuelo = Vuelo::find($id_vuelo);
        if($paquete->tipo_paquete == 'Alojamiento'){
            $hospedaje = Hospedaje::find($id_extra);
        }
        elseif($paquete->tipo_paquete == 'Automóvil'){
            $transporte = Transporte::find($id_extra);
        }
        //Se reserva el paquete
        $reserva = new Reserva;
        $reserva->monto_total_reserva=$paquete->precio_paquete*$num_pasajeros;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_promocion=null;
        $reserva->id_paquete=$paquete->id;
        if($paquete->tipo_paquete == 'Alojamiento'){
            $reserva->hospedaje=true;
        }else{
            $reserva->hospedaje=false;
        }
        if($paquete->tipo_paquete == 'Automóvil'){
            $reserva->transporte=true;
        }else{
            $reserva->transporte=false;
        }
        $reserva->vuelo=true;
        $reserva->save();   

        //Falta reservar los asientos del vuelo

        //Se reserva el hospedaje/automóvil
        if($paquete->tipo_paquete == 'Alojamiento'){
            $hospedaje = Hospedaje::find($id_extra);
            $habitacionesValidas = array();
            $habitaciones = Habitacion::All()->where('id_hospedaje', $hospedaje->id);
            foreach($habitaciones as $habitacion){
                if($habitacion->id_hospedaje == $hospedaje->id){
                    $habitacionesValidas[] = $habitacion;
                }
            }
            $len = sizeof($habitacionesValidas);
            $elemento = rand(0,$len);
            $habitacion = $habitacionesValidas[$elemento];
            $res_hab = new Habitacion_Reserva;
            $res_hab->id_habitacion = $habitacion->id;
            $res_hab->id_reserva = $reserva->id;
            $res_hab->fecha_inicio = $paquete->fecha_paquete;
            $fecha_fin = date('Y-m-d',strtotime($paquete->fecha_paquete.' + '.$paquete->num_dias.' days'));
            $res_hab->fecha_fin =$fecha_fin;
            $res_hab->save();
        }
        elseif($paquete->tipo_paquete == 'Automóvil'){
            $transporte = Transporte::find($id_extra);
            $res_trans = new Transporte_Reserva;
            $res_trans->id_transporte = $transporte->id;
            $res_trans->id_reserva = $reserva->id;
            $res_trans->fecha_inicio = $paquete->fecha_paquete;
            $fecha_fin = date('Y-m-d',strtotime($paquete->fecha_paquete.' + '.$paquete->num_dias.' days'));
            $res_trans->fecha_fin = $fecha_fin;
            $res_trans->save();

            $transporte->disponibilidad = false;
            $transporte->save();
        }
        return view('home');
    }
}
