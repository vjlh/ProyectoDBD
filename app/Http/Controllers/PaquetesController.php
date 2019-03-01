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
    public function index($tipo)
    {
        $paquetes = Paquete::All()->where('tipo_paquete','=', $tipo);
        return $paquetes;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $paquete = Paquete::create($request->all());
        $paquete->save();
        
        return back()->with('success_message','Agregado con éxito!');
 

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

    public function update(Request $request, $id)
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

    public function destroy($id)
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

    public function reservarPaquete(){
        $paquete = Paquete::find(request('paquete'));
        $num_pasajeros = request('num_pasajeros');
        if($num_pasajeros == NULL){
            $num_pasajeros = -1;
        }
        if($paquete->tipo_paquete == 'Alojamiento'){
            $hospedaje = Hospedaje::find($paquete->id_hospedaje);
            $habitacion = Habitacion::find($paquete->id_habitacion);
        }
        elseif($paquete->tipo_paquete == 'Automóvil'){
            $transporte = Transporte::find($id_extra);
        }
        elseif($paquete->tipo_paquete == 'All'){
            $hospedaje = Hospedaje::find($paquete->id_hospedaje);
            $habitacion = Habitacion::find($paquete->id_habitacion);
            $transporte = Transporte::find($id_extra);
        }
        //Se reserva el paquete
        $reserva = new Reserva;
        $reserva->monto_total_reserva= $paquete->precio_paquete * $num_pasajeros;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_promocion=null;
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
        $asientos_ida = Asiento::All()->where('id_avion','=', $vuelo_ida->id_avion)
                                      ->where('cabina','=', 'Salon-Cama')
                                      ->where('disponibilidad', '=', true);
        $len_ida = sizeof($asientos_ida);
        if($len_ida >= $num_pasajeros){}
        else {
            return redirect()->action('PaquetesController@show',['id' => $paquete->id])
            ->with('status','No quedan suficientes asientos disponibles en el vuelo de ida para el paquete que solicitó.');
        }

        //Se reservan los asientos para el vuelo de regreso
        $vuelo_vuelta = Vuelo::find($paquete->id_vuelo_vuelta);
        $asientos_vuelta = Asiento::All()->where('id_avion','=', $vuelo_vuelta->id_avion)
                                         ->where('cabina','=', 'Salon-Cama')
                                         ->where('disponibilidad','=', true);
        $len_vuelta = sizeof($asientos_vuelta);
        if($len_vuelta >= $num_pasajeros){} 
        else {
            return redirect()->action('PaquetesController@show',['id' => $paquete->id])
            ->with('status','No quedan suficientes asientos disponibles en el vuelo de ida para el paquete que solicitó.');
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
        return \Redirect::to('/')->with('paqueteReservado','El paquete ha sido reservado.');
    }
}
