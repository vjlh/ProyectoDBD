<?php

namespace App\Http\Controllers;

use App\Seguro;
use Illuminate\Http\Request;
use App\Http\Requests\SegurosRequest;
use Carbon\Carbon;

class SegurosController extends Controller
{

    public function index()
    {
        //Funcion que se utilizará para desplegar los seguros según las busqueda
        $fecha_ida = Carbon::parse(request('fecha_ida'));
        $fecha_vuelta = Carbon::parse(request('fecha_vuelta'));
        $diasDiferencia = $fecha_vuelta->diffInDays($fecha_ida);

        $destino= request('destino');
        $numero_pasajeros= request('numero_pasajeros');

        
        session()->put('diasDuracion_seguro', $diasDiferencia);
        session()->put('fechaInicio_seguro', $fecha_ida);
        session()->put('fechaFin_seguro', $fecha_vuelta);
        session()->put('destino_seguro', $destino);
        session()->put('numeroPasajeros_seguro', $numero_pasajeros);

        $seguros = Seguro::all();
        return view('reservar_seguro',compact('seguros'));
    }

    public function create()
    {
        //
    }

    public function store(SegurosRequest $request)
    {
        $seguro = Seguro::create($request->all());
        $seguro->save();
        return $seguro;
    }

    public function show($id)
    {
        $seguro = Seguro::find($id);

        $numero_dias = session()->get('diasDuracion_seguro');
        $costoFinal = $seguro->precio_seguro;
        $fecha_inicio = session()->get('fechaInicio_seguro');
        $fecha_fin = session()->get('fechaFin_seguro');

        $reserva = new Reserva;
        $reserva->monto_total_reserva=$costoFinal;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=$id;
        $reserva->id_promocion=null;
        $reserva->id_paquete=null;
        $reserva->transporte=false;
        $reserva->hospedaje=false;
        $reserva->vuelo=false;
        $reserva->save();

        session()->put('costoFinal_seguro', $costoFinal);        
        $hospedajes = Hospedaje::all();
        return $seguro;

    }

    public function edit(Seguro $seguro)
    {
        //
    }

    public function update(SegurosRequest $request, $id)
    {
        $seguro = Seguro::find($id);
        $seguro->fill($request->all());
        $seguro->save();
        return $seguro;
    }

    public function destroy($id)
    {
        $seguro = Seguro::find($id);
        if($seguro!=NULL)
        {
            $seguro->delete();
            Seguro::destroy($id);
            return back()->with('success_message','Se ha eliminado el seguro con éxito!');
        }
        else
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');

    }
}
