<?php

namespace App\Http\Controllers;

use App\Asiento;
use App\Reserva;
use App\Ciudad;
use App\Vuelo;
use App\Asiento_Vuelo;
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
        $vuelo = Vuelo::find(request('vuelo'));
        $num_pasajeros = request('num_pasajeros');
        $id_avion = $vuelo->id_avion;
        $asientos = Asiento::all()->where('id_avion','=',$id_avion);
        /*$asientos_vuelo = Asiento_Vuelo::All()->where('id_vuelo', '=', $vuelo->id);

        $asientos_vuelo_array = [];
        foreach($asientos_vuelo as $asiento){
            array_push($asientos_vuelo_array, $asiento->id);
        }
        $len = sizeof($asientos_vuelo_array);
        if($len >= $num_pasajeros)
        {
            $asientos = Asiento::all()->whereIn('id', $asientos_vuelo_array);
            return view('seleccion_asiento',compact('asientos', 'num_pasajeros','vuelo'));
        }
        else{
            return \Redirect::back()->with('statusAsientos','No hay suficientes asientos.');
        }*/
        return view('seleccion_asiento',compact('asientos', 'num_pasajeros','vuelo'));

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
    public function resas(){
        $asientos = Asiento::All();
        $vuelo = Vuelo::find(request('id_vuelo'));
        $asientos_seleccionados = [];
        $costoFinal = 0;
        foreach($asientos as $asiento){
            if(request($asiento->id) == 'on'){
                array_push($asientos_seleccionados,$asiento->id);
                $costoFinal = $costoFinal + $asiento->precio_asiento;
            }
        }

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

        $asientos_seleccionados_vuelo = Asiento_Vuelo::All()->where('id_vuelo','=',$vuelo->id)
                                                            ->whereIn('id_asiento',$asientos_seleccionados);
        $asientos_seleccionados_vuelo_array = [];
        foreach($asientos_seleccionados_vuelo as $asiento){
            array_push($asientos_seleccionados_vuelo_array,$asiento->id);
        }
        $len = sizeof($asientos_seleccionados_vuelo_array);
        for($i=0;$i<$len;$i++){
            $asiento = Asiento_Vuelo::find($asientos_seleccionados_vuelo_array[$i]);
            $asiento->disponible = false;
            $asiento->id_reserva = $reserva->id;
            $asiento->save();
        }

        return \Redirect::to('/')->with('statusReservaVuelo','El vuelo ha sido reservado.');
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
