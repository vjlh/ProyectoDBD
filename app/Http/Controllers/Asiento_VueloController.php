<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Asiento_VueloRequest;
use App\Asiento_Vuelo;
use App\Reserva;
use App\Asiento;
use App\Vuelo;
use App\User;
use DB;


class Asiento_VueloController extends Controller
{
    //Probado
    public function index()
    {
        return Asiento_Vuelo::all();
    }

    public function create()
    {
        //
    }

    public function store(Asiento_VueloRequest $request)
    {
        try{
            $id_vuelo = $request->get('id_vuelo');
            \App\Vuelo::find($id_vuelo)->id;
            $id_asiento = $request->get('id_asiento');
            \App\Asiento::find($id_asiento)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;
            
            $as_vue = Asiento_Vuelo::create($request->all());
            $as_vue->save();
            return $as_vue;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $as_vue = Asiento_Vuelo::find($id);
        
        if($as_vue != NULL)
            return $as_vue;
        else 
            return "No existe un as_vue con la id ingresada";
    }

    public function edit(Asiento_Vuelo $as_vue)
    {
        //
    }

    public function update(Asiento_VueloRequest $request, $id)
    {
        $as_vue = Asiento_Vuelo::find($id);
        try{
            $id_vuelo = $request->get('id_vuelo');
            \App\Vuelo::find($id_vuelo)->id;
            $id_asiento = $request->get('id_asiento');
            \App\Asiento::find($id_asiento)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $as_vue->fill($request->all());
            $as_vue->save();
            return $as_vue;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $as_vue = Asiento_Vuelo::find($id);
        if($as_vue != NULL){
            $as_vue->delete();
            Asiento_Vuelo::destroy($id);
            return "La as_vue se ha eliminado";
        }
        else
            return "No existe un as_vue con la id ingresada";
    }
    public function buscarCheckIn()
    {
        $id_obtenida = request('codigo_reserva');
        $reserva = Reserva::find($id_obtenida);
        $id_user = $reserva->id_user;
        if($reserva->check_in == true){
            return \Redirect::to('/checkin_1')->with('statusCheckIn1','Esta reserva ya cuenta con su Check In realizado');
        }

        else if($reserva->check_in == false && $reserva->vuelo == true)
        {
            /*$asiento_vuelo = Asiento_Vuelo::find(1)all()->where('id_reserva', '=' , $id_obtenida)*/
            $asiento_vuelo = Asiento_Vuelo::All()->where('id_reserva', $id_obtenida);
            $id_asientos = [];
            foreach($asiento_vuelo as $asiento){
                array_push($id_asientos, $asiento->id);
                $id_vuelo = $asiento->id_vuelo;
            }           
            $vuelo = Vuelo::find($id_vuelo);
            $asientos = Asiento::All()->whereIn('id', $id_asientos);
            $user = User::find($id_user);
            return view('checkin_2',compact('vuelo','asientos','user','id_obtenida'));
        }

    }
}
