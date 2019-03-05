<?php

namespace App\Http\Controllers;

use DB;
use App\Paquete;
use App\Reserva;
use App\Ciudad;
use App\Vuelo;
use App\Asiento;
use App\Asiento_Vuelo;
use App\Hospedaje;
use App\Habitacion;
use App\Transporte;
use App\Transporte_Reserva;
use App\Habitacion_Reserva;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PaquetesRequest;
use Mail;
use App\Mail\SendEmail_paquete;
use Carbon\Carbon;

class PaquetesController extends Controller
{
    //Probado
    function index($tipo)
    {
        $paquetes = Paquete::All()->where('tipo_paquete','=', $tipo);
        return $paquetes;
    }

    function create()
    {
        //
    }

    function store(Request $request)
    {
        $paquete = Paquete::create($request->all());
        $paquete->save();
        
        return back()->with('success_message','Agregado con éxito!');
 

    }


    function respaq($id){
        $paquete = Paquete::find($id);

        $reserva = new Reserva;
        $reserva->monto_total_reserva=$paquete->precio_paquete;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_paquete=$id;
        $reserva->transporte=false;
        $reserva->hospedaje=false;
        $reserva->vuelo=false;
        $reserva->save();
        
        $ciudades = Ciudad::all();

        return view('home',compact('ciudades'));

    }

    function show($id)
    { 
        $paquete = Paquete::find($id);
        session()->put('paquete', $paquete);
        return view('detallePaquete',compact('paquete'));
        

    }

    function edit(Paquete $paquete)
    {
        //
    }

    function update(Request $request, $id)
    {
        $paquete = Paquete::find($id);
        $outcome = $paquete->fill($this->validate($request, [
            'num_dias' => 'required',
            'num_noches' => 'required',
            'fecha_paquete' => 'required',
            'precio_paquete' => 'required',
            'destino_paquete' => 'required',
            'tipo_paquete' => 'required',
            'id_vuelo_ida' => 'required',
            'id_vuelo_vuelta' => 'required',
            'id_transporte' => 'required',
            'id_hospedaje' => 'required',
            'id_habitacion' => 'required',

        ]))->save();

        if ($outcome) {
            //dd("aqui");
            return back()->with('success_message','Actualizado con éxito!');
        } else {
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');
            //dd("aqui2");
        }
    }

    function destroy($id)
    {
        $paquete = Paquete::find($id);
        if($paquete!=NULL)
        {
            $paquete->delete();
            Paquete::destroy($id);
            return back()->with('success_message','Se ha eliminado el paquete con éxito!');
        }
        else
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');

    }

    function reservarPaquete(){
        $paquete = Paquete::find(request('paquete'));
        $num_pasajeros = request('num_pasajeros');

        if($paquete->tipo_paquete == 'Alojamiento'){
            $hospedaje = Hospedaje::find($paquete->id_hospedaje);
            $habitacion = Habitacion::find($paquete->id_habitacion);
        }
        elseif($paquete->tipo_paquete == 'Automóvil'){
            $transporte = Transporte::find($paquete->id_transporte);
        }
        elseif($paquete->tipo_paquete == 'All'){
            $hospedaje = Hospedaje::find($paquete->id_hospedaje);
            $habitacion = Habitacion::find($paquete->id_habitacion);
            $transporte = Transporte::find($paquete->id_transporte);
        }
        //Se reserva el paquete
        $reserva = new Reserva;
        $reserva->monto_total_reserva= $paquete->precio_paquete * $num_pasajeros;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_paquete=$paquete->id;
        $reserva->vuelo=true;
        $reserva->hospedaje=false;
        $reserva->transporte=false;
        if($paquete->tipo_paquete == 'Alojamiento'){$reserva->hospedaje=true;}
        if($paquete->tipo_paquete == 'Automóvil'){$reserva->transporte=true;}
        if($paquete->tipo_paquete == 'All'){
            $reserva->hospedaje=true;
            $reserva->transporte=true;
        }
        $reserva->save();

        //Se reservan los asientos para el vuelo de ida
        $vuelo_ida = Vuelo::find($paquete->id_vuelo_ida);
        $asientos_vuelo_ida = Asiento_Vuelo::All()->where('id_vuelo','=',$vuelo_ida->id)
                                                          ->where('disponible','=',true);
        $asientos_vuelo_ida_array = [];
        $asientos_ida_usados = [];

        foreach($asientos_vuelo_ida as $asiento){
            array_push($asientos_vuelo_ida_array, $asiento->id_asiento);
        }
        if(!empty($asientos_vuelo_ida_array)){
            $asientos_ida = Asiento::All()->where('id_avion', '=', $vuelo_ida->id_avion)
                                                 ->whereNotIn('id', $asientos_vuelo_ida_array);
            $asientos_ida_array = [];
            foreach($asientos_ida as $asiento){
                array_push($asientos_ida_array, $asiento->id);
            }

            $len_ida = sizeof($asientos_ida_array);
            if($len_ida >= $num_pasajeros){
                for($i=0;$i<$num_pasajeros;$i++){
                    $as_vue_ida = new Asiento_Vuelo;
                    $as_vue_ida->disponible = false;
                    $as_vue_ida->id_reserva = $reserva->id;
                    $as_vue_ida->id_asiento = $asientos_ida_array[$i];
                    $as_vue_ida->id_vuelo = $paquete->id_vuelo_ida;
                    $as_vue_ida->save();
                    array_push($asientos_ida_usados, $asientos_ida_array[$i]);

                }
            }
            else {
                return redirect()->action('PaquetesController@show', ['id' => $paquete->id])
                ->with('status','No quedan suficientes asientos disponibles en el vuelo de ida para el paquete que solicitó.');
            }
        }
        else{
            $asientos_ida = Asiento::All()->where('id_avion', '=', $vuelo_ida->id_avion);
            $asientos_ida_array = [];
            foreach($asientos_ida as $asiento){
                array_push($asientos_ida_array, $asiento->id);
            }
            for($i=0;$i<$num_pasajeros;$i++){
                $as_vue_ida = new Asiento_Vuelo;
                $as_vue_ida->disponible = false;
                $as_vue_ida->id_reserva = $reserva->id;
                $as_vue_ida->id_asiento = $asientos_ida_array[$i];
                $as_vue_ida->id_vuelo = $paquete->id_vuelo_ida;
                $as_vue_ida->save();
                array_push($asientos_ida_usados, $asientos_ida_array[$i]);

            }
        }

        //Se reservan los asientos para el vuelo de regreso
        $vuelo_vuelta = Vuelo::find($paquete->id_vuelo_vuelta);
        $asientos_vuelo_vuelta = Asiento_Vuelo::All()->where('id_vuelo','=',$vuelo_vuelta->id)
                                                          ->where('disponible','=',true);
        $asientos_vuelo_vuelta_array = [];
        $asientos_vuelta_usados = [];

        foreach($asientos_vuelo_vuelta as $asiento){
            array_push($asientos_vuelo_vuelta_array, $asiento->id_asiento);
        }
        if(!empty($asientos_vuelo_vuelta_array)){
            $asientos_vuelta = Asiento::All()->where('id_avion', '=', $vuelo_vuelta->id_avion)
                                                 ->whereNotIn('id', $asientos_vuelo_vuelta_array);
            $asientos_vuelta_array = [];
            foreach($asientos_vuelta as $asiento){
                array_push($asientos_vuelta_array, $asiento->id);
            }
            $len_ida = sizeof($asientos_vuelta_array);
            if($len_ida >= $num_pasajeros){
                for($i=0;$i<$num_pasajeros;$i++){
                    $as_vue_vuelta = new Asiento_Vuelo;
                    $as_vue_vuelta->disponible = false;
                    $as_vue_vuelta->id_reserva = $reserva->id;
                    $as_vue_vuelta->id_asiento = $asientos_vuelta_array[$i];
                    $as_vue_vuelta->id_vuelo_vueltaelo = $paquete->id_vuelo_vuelta;
                    $as_vue_vuelta->save();
                    array_push($asientos_vuelta_usados, $asientos_vuelta_array[$i]);
                }
            }
            else {
                return redirect()->action('PaquetesController@show', ['id' => $paquete->id])
                ->with('status','No quedan suficientes asientos disponibles en el vuelo de ida para el paquete que solicitó.');
            }
        }
        else{
            $asientos_vuelta = Asiento::All()->where('id_avion', '=', $vuelo_vuelta->id_avion);
            $asientos_vuelta_array = [];
            foreach($asientos_vuelta as $asiento){
                echo "<script>console.log('id asiento = $asiento->id');</script>";
                array_push($asientos_vuelta_array, $asiento->id);
            }
            for($i=0;$i<$num_pasajeros;$i++){
                $as_vue_vuelta = new Asiento_Vuelo;
                $as_vue_vuelta->disponible = false;
                $as_vue_vuelta->id_reserva = $reserva->id;
                $as_vue_vuelta->id_asiento = $asientos_vuelta_array[$i];
                $as_vue_vuelta->id_vuelo = $paquete->id_vuelo_vuelta;
                $as_vue_vuelta->save();
                array_push($asientos_vuelta_usados, $asientos_vuelta_array[$i]);

            }
        }
        //Se reserva el hospedaje
        if($paquete->tipo_paquete == 'Alojamiento'){
            $res_hab = new Habitacion_Reserva;
            $res_hab->id_habitacion = $habitacion->id;
            $res_hab->id_reserva = $reserva->id;
            $res_hab->fecha_inicio = $paquete->fecha_paquete;
            $fecha_fin = date('Y-m-d',strtotime($paquete->fecha_paquete.' + '.$paquete->num_dias.' days'));
            $res_hab->fecha_fin =$fecha_fin;
            $res_hab->save();
        }
        //Se reserva el automóvil
        elseif($paquete->tipo_paquete == 'Automóvil'){
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
        //Se reserva el hospedaje y automóvil
        elseif($paquete->tipo_paquete == 'All'){
            $res_hab = new Habitacion_Reserva;
            $res_hab->id_habitacion = $habitacion->id;
            $res_hab->id_reserva = $reserva->id;
            $res_hab->fecha_inicio = $paquete->fecha_paquete;
            $fecha_fin = date('Y-m-d',strtotime($paquete->fecha_paquete.' + '.$paquete->num_dias.' days'));
            $res_hab->fecha_fin =$fecha_fin;
            $res_hab->save();

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

        $id_usuario = auth()->id();
        $usuario = User::find($id_usuario);
        $nombre_user = $usuario->name;
        $apellido_user = $usuario->apellido_usuario;
        $encabezado = "Estimado Sr(a) ".$nombre_user." ".$apellido_user." ha realizado una reserva de paquete";
        $email = $usuario->email;
        $subject = "Reserva de Paquete";

        $costo = $reserva->monto_total_reserva;
        $asientos_ida = Asiento::all()->whereIn('id',$asientos_ida_usados);
        $asientos_vuelta = Asiento::all()->whereIn('id',$asientos_vuelta_usados);
        Mail::to($email)->send(new SendEmail_paquete($subject,$encabezado,$num_pasajeros, $costo, $paquete, $asientos_ida, $asientos_vuelta));

        return \Redirect::to('/')->with('paqueteReservado','El paquete ha sido reservado.');
    }
}
