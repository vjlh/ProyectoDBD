<?php

namespace App\Http\Controllers;

use App\Asiento;
use App\Reserva;
use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Requests\AsientosRequest;
use App\Avion;
use App\Http\Requests\AvionesRequest;
use Session;

class AsientosController extends Controller
{
    //Probado
    public function index()
    {

        $asientos = Asiento::all()->where('id_avion', request("avioncito_id"));

        return view('seleccion_asiento',compact('asientos'));
    }

    public function create()
    {
        //
    }

    public function store(AsientosRequest $request)
    {

        try{
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;
            $id_avion = $request->get('id_avion');
            \App\Avion::find($id_avion)->id;

            $asiento = Asiento::create($request->all());
            $asiento->save();
            return $asiento;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function show($id)
    {
        $asiento = Asiento::find($id);
        if($asiento!=NULL)
            return $asiento;
        
        else
            return "No existe asiento con la id ingresada";
    }

    public function edit(Asiento $asiento)
    {
        //
    }
    public function resas($id){
        $id_asiento = $id;
        $asiento = Asiento::find($id_asiento);
        $costoFinal = $asiento->precio_asiento;

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

        $asiento = Asiento::find($id_asiento);
        $asiento->id_reserva = $reserva->id;
        $asiento->save();

        $ciudades = Ciudad::all();


        return view('home',compact('ciudades'));
    }

    public function update(AsientosRequest $request, $id)
    {
        $id_asiento = $request->get('asiento_id');
        $asiento = Asiento::find($id_asiento);
        $costoFinal = $asiento->precio_asiento;

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

        $asiento = Asiento::find($id_asiento);
        $asiento->id_reserva = $reserva->id;
        $asiento->save();


        /*
        $asiento = Asiento::find($id);
        try{
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;
            $id_avion = $request->get('id_avion');
            \App\Avion::find($id_avion)->id;

            $asiento->fill($request->all());
            $asiento->save();
            return $asiento;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }*/
    }

    public function destroy($id)
    {
        $asiento = Asiento::find($id);
        if($asiento != NULL)
        {
            $asiento->delete();
            Asiento::destroy($id);
            return "El asiento ha sido eliminado";
        }
        else
            return "El asiento con el id ingresado no existe o ya fue eliminado";
        
    }
    
}
