<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Habitacion_ReservaRequest;
use App\Habitacion_Reserva;
use App\Reserva;
use App\User;
use App\Hospedaje;
use App\Habitacion;
use Mail;
use App\Mail\SendEmail_hospedaje;
use Carbon\Carbon;

class Habitacion_ReservaController extends Controller
{
    //Probado
    function index()
    {
        return Habitacion_Reserva::all();
    }

    function create()
    {
        //
    }

    function store(Habitacion_ReservaRequest $request)
    {
        
       //
    }

    function show($id)
    {
        // Unix

        setlocale(LC_TIME, 'es_ES.UTF-8'); 
        Carbon::setLocale('es'); 
        $fecha1 = Carbon::parse(session()->get('fecha_ida'))->formatLocalized('%d %B %Y');
        $fecha2 = Carbon::parse(session()->get('fecha_vuelta'))->formatLocalized('%d %B %Y');

        $fecha_inicio = session()->get('fecha_ida');
        $fecha_fin = session()->get('fecha_vuelta');

        session()->put('fecha_ida',$fecha1);
        session()->put('fecha_vuelta',$fecha2);


        $habitacion = Habitacion::find($id);
        $numero_dias = session()->get('diasDiferencia');
        $costoFinal = $numero_dias * $habitacion->precio;


        $reserva = new Reserva;
        $reserva->monto_total_reserva=$costoFinal;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
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

        if ($habitacion->banio_privado == true){$banio_privado = 'Sí';}else{$banio_privado = 'No';}
        if ($habitacion->aire_acondicionado_habitacion == true){$aire_acondicionado = 'Sí';}else{$aire_acondicionado = 'No';}
        $id_usuario = auth()->id();
        $usuario = User::find($id_usuario);
        $nombre_user = $usuario->name;
        $apellido_user = $usuario->apellido_usuario;
        $encabezado = "Estimado Sr(a) ".$nombre_user." ".$apellido_user." ha realizado una reserva de hospedaje";
        $email = $usuario->email;
        $subject = "Reserva de Habitacion";
        $hospedaje = session()->get('hospedaje');
        
        
        Mail::to($email)->send(new SendEmail_hospedaje($subject,$encabezado, $fecha1, $fecha2, $costoFinal, $hospedaje, $habitacion, $numero_dias));

        $habitacion->disponibilidad = false;
        $habitacion->save();
        session()->put('costo_final', $costoFinal);        
        $hospedajes = Hospedaje::all();
        
        return view('detallesReservaHospedaje',compact('habitacion'));
    }

    function edit(Habitacion_Reserva $hab_res)
    {
        //
    }

    function update($id)
    {
        //
    }

    function destroy($id)
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
