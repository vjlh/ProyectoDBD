<?php

namespace App\Http\Controllers;

use App\Asiento;
use App\Reserva;
use App\Ciudad;
use App\Vuelo;
use App\Asiento_Vuelo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AsientosRequest;
use App\Avion;
use App\Http\Requests\AvionesRequest;
use Session;
use Mail;
use App\Mail\SendEmail_vuelo;
use Carbon\Carbon;
use App\Historial;

class AsientosController extends Controller
{
    //Probado
    function index()
    {
        $vuelo = Vuelo::find(request('vuelo'));
        $num_pasajeros = request('num_pasajeros');
        $asientos_vuelos = Asiento_Vuelo::All()->where('id_vuelo','=',$vuelo->id)
                                               ->where('disponible','=', false);
        $asientos_vuelos_array = [];
        foreach($asientos_vuelos as $asiento){
            array_push($asientos_vuelos_array, $asiento->id_asiento);
        }
        $asientos = Asiento::all()->where('id_avion','=',$vuelo->id_avion)
                                  ->whereNotIn('id', $asientos_vuelos_array);

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

    function create()
    {
        //
    }

    function store(AsientosRequest $request)
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

    function show($id)
    {
        $asiento = Asiento::find($id);
        if($asiento!=NULL)
            return $asiento;
        
        else
            return "No existe asiento con la id ingresada";
    }

    function edit(Asiento $asiento)
    {
        //
    }
    function resas(){
        $asientos = Asiento::All();
        $vuelo = Vuelo::find(request('id_vuelo'));
        $asientos_seleccionados = [];
        $codigo_checkin = str_random(9);

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
        $reserva->codigo_reserva=$codigo_checkin;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_paquete=null;
        $reserva->transporte=false;
        $reserva->hospedaje=false;
        $reserva->vuelo=true;
        $reserva->save();

        $len = sizeof($asientos_seleccionados);
        for($i=0;$i<$len;$i++){
            $asiento = new Asiento_Vuelo;
            $asiento->disponible = false;
            $asiento->id_reserva = $reserva->id;
            $asiento->id_vuelo = $vuelo->id;
            $asiento->id_asiento = Asiento::find($asientos_seleccionados[$i])->id;
            $asiento->check_in = false;
            $asiento->codigo_checkin = $codigo_checkin;
            $asiento->save();
        }

        setlocale(LC_TIME, 'es_ES.UTF-8'); 
        Carbon::setLocale('es'); 

        $id_usuario = auth()->id();
        $usuario = User::find($id_usuario);
        $nombre_user = $usuario->name;
        $apellido_user = $usuario->apellido_usuario;
        $encabezado = "Estimado Sr(a) ".$nombre_user." ".$apellido_user." ha realizado una reserva de vuelo";
        $email = $usuario->email;
        $subject = "Reserva de Vuelo";

        $fecha = Carbon::parse($vuelo->fecha_vuelo)->formatLocalized('%d %B %Y');
        $hora = Carbon::parse($vuelo->hora_vuelo)->format('H:i');
        $origen = $vuelo->origen_vuelo;
        $destino = $vuelo->destino_vuelo;
        $costo = $costoFinal;
        $asientos_select = Asiento::all()->whereIn('id',$asientos_seleccionados);

        $historial = new Historial;
        $historial->id_user=$id_usuario;
        $historial->descripcion="Sr(a) ".$nombre_user." ha realizado una reserva de vuelo";
        $historial->save();
        
        Mail::to($email)->send(new SendEmail_vuelo($subject,$encabezado,$codigo_checkin, $fecha, $hora, $origen, $destino, $costo, $asientos_select));

        return \Redirect::to('/')->with('statusReservaVuelo','El vuelo ha sido reservado.');
    }

    function update(AsientosRequest $request, $id)
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

    function destroy($id)
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
