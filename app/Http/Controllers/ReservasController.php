<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Pasajero;
use App\Pasajero_Reserva;
use App\Vuelo;
use App\Asiento;
use App\Asiento_Vuelo;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\ReservasRequest;
use Mail;
use App\User;
use App\Mail\SendEmail_checkin;
use Carbon\Carbon;
use App\Historial;

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

    public function update(Request $request, $id)
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
    public function checkIn($cod_obtenido)
    {
        $asientos = Asiento_Vuelo::all()->where('codigo_checkin',$cod_obtenido);
        $asiento_1 = $asientos->first();
        $id_reserva = $asiento_1->id_reserva;
        $id_vuelo = $asiento_1->id_vuelo;
        $ids_asiento = [];

        foreach($asientos as $asiento){
            $asiento->check_in = true;
            $asiento->save();
            array_push($ids_asiento,$asiento->id_asiento);
        }
        
        $ids_pasajeros = session()->get('pasajerosId_CheckIn');
        foreach($ids_pasajeros as $id){
            $pasajero_reserva = New Pasajero_Reserva;
            $pasajero_reserva->id_reserva = $id_reserva;
            $pasajero_reserva->id_pasajero = $id;
            $pasajero_reserva->save();
        }

        $id_usuario = auth()->id();
        $usuario = User::find($id_usuario);
        $nombre_user = $usuario->name;
        $encabezado = "Estimado Sr(a) ".$nombre_user." ".$apellido_user." ha realizado Check In";
        $email = $usuario->email;
        $subject = "Check In realizado";
        $vuelo = Vuelo::find($id_vuelo);
        $asientos_1 = Asiento::all()->whereIn('id',$ids_asiento);
        $pasajeros = Pasajero::all()->whereIn('id',$ids_pasajeros);
        

        $historial = new Historial;
        $historial->id_user=$id_usuario;
        $historial->descripcion="Sr(a) ".$nombre_user." ha realizado check-in del vuelo ".$id_vuelo;
        $historial->save();

        
        Mail::to($email)->send(new SendEmail_checkin($subject,$encabezado, $vuelo,$asientos_1,$pasajeros));
        session()->forget('numPasajero_CheckIn');
        session()->forget('pasajerosId_CheckIn');

        return \Redirect::to('/')->with('statusCheckIn2','El Check-In ha sido realizado exitósamente');

    }
}
