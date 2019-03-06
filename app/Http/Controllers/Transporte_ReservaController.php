<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Transporte_reservaRequest;
use App\Transporte_reserva;
use App\Transporte;
use App\Reserva;
use Mail;
use App\User;
use App\Mail\SendEmail;
use Carbon\Carbon;
use App\Historial;


class Transporte_ReservaController extends Controller
{
    //Probado
    public function index($id)
    {
        //
    
    }

    public function create()
    {
        //
    }

    public function store(Transporte_reservaRequest $request)
    {
       //
    }

    public function show($id)
    {
        $transporte = Transporte::find($id);
        $numero_dias = session()->get('diasTransporte');
        $costoFinal = $numero_dias* $transporte->precio;

        setlocale(LC_TIME, 'es_ES.UTF-8'); 
        Carbon::setLocale('es'); 
        $fecha1 = Carbon::parse(session()->get('fechaInicioTransporte'))->formatLocalized('%d %B %Y');
        $fecha2 = Carbon::parse(session()->get('fechaFinTransporte'))->formatLocalized('%d %B %Y');

        $fecha_inicio = session()->get('fechaInicioTransporte');
        $fecha_fin = session()->get('fechaFinTransporte');
        session()->put('fechaInicioTransporte',$fecha1);
        session()->put('fechaFinTransporte',$fecha2);

        $reserva = new Reserva;
        $reserva->monto_total_reserva=$costoFinal;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=null;
        $reserva->id_paquete=null;
        $reserva->transporte=true;
        $reserva->hospedaje=false;
        $reserva->vuelo=false;
        $reserva->save();


        $res_trans = new Transporte_Reserva;
        $res_trans->id_transporte = $id;
        $res_trans->id_reserva = $reserva->id;
        $res_trans->fecha_inicio = $fecha_inicio;
        $res_trans->fecha_fin =$fecha_fin;
        $res_trans->save();

        if($transporte->aire_acondicionado_transporte == true){$aire = 'Si';}
        else{$aire = 'No';}

        $id_usuario = auth()->id();
        $usuario = User::find($id_usuario);
        $nombre_user = $usuario->name;
        $encabezado = "Estimado Sr(a) ".$nombre_user." ha realizado una reserva de transporte";
        $email = $usuario->email;
        $subject = "Reserva de Automóvil";
        $modelo = $transporte->modelo_transporte;
        $patente = $transporte->patente_transporte;
        $puntuacion = $transporte->puntuacion_transporte;
        $asientos = $transporte->num_asientos_transporte;
        $puertas =  $transporte->num_puertas_transporte;

        $historial = new Historial;
        $historial->id_user=$id_usuario;
        $historial->descripcion="Sr(a) ".$nombre_user." ha realizado una reserva de transporte";
        $historial->save();

        
        
        Mail::to($email)->send(new SendEmail($subject,$encabezado, $fecha1, $fecha2, $costoFinal, $aire, $modelo, $patente, $puntuacion, $asientos, $puertas ));

        $transporte->disponibilidad = false;
        $transporte->save();
        session()->put('costoReservaTransporte', $costoFinal);        
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
