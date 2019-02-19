<?php

namespace App\Http\Controllers;

use App\Transporte;
use Illuminate\Http\Request;
use App\Http\Requests\TransportesRequest;
use Carbon\Carbon;


class TransportesController extends Controller
{

    public function index()
    {
        /*$transporte = Transporte::all()
        ->where('modelo_transporte','=',request("modelo_transporte"))
        ->where('num_asientos_transporte','=',request("num_asientos_transporte"))
        ->where('num_puertas_transporte','=',request("num_puertas_transporte"))
        ->where('aire_acondicioando_transporte','=',request("aire_acondicionado_transporte"));

        return view('seleccionar_auto', compact('seleccionar_auto'));*/

        $fecha_inicio = Carbon::parse(request('fecha_inicio'));
        $fecha_fin = Carbon::parse(request('fecha_fin'));
        $diasDiferencia = $fecha_fin->diffInDays($fecha_inicio);

        $ciudad = request('ciudad_inicio');
        $num_asientos= request('num_asientos_transporte');

        $transportes = Transporte::all()->where('num_asientos_transporte','=',$num_asientos)
                                        ->where('disponibilidad','=',1);
        
        /*->where('ubicacion','=',$ciudad_hospedaje) */
        session()->put('diasTransporte', $diasDiferencia);
        session()->put('fechaInicioTransporte', $fecha_inicio);
        session()->put('fechaFinTransporte', $fecha_fin);
        session()->put('ubicacionTransporte', $ciudad);
        session()->put('asientosTransporte', $num_asientos);

        return view('autos',compact('transportes'));
    }

    public function create()
    {
        //
    }

    public function store(TransportesRequest $request)
    {
        $transporte = Transporte::create($request->all());
        $transporte->save();
        return $transporte;
    }

    public function show($id)
    {
        $transporte = Transporte::find($id);
        if($transporte!=NULL)
            return $transporte;
        else
            return "El transporte con el id ingresado no existe o fue eliminado"; 
    }

    public function edit(Transporte $transporte)
    {
        //
    }

    public function update(TransportesRequest $request, $id)
    {
        $transporte = Transporte::find($id);
        $transporte->fill($request->all());
        $transporte->save();
        return $transporte;
    }

    public function destroy($id)
    {
        $transporte = Transporte::find($id);
        if($transporte!=NULL)
        {
            $transporte->delete();
            Transporte::destroy($id);
            return "Se ha eliminado el transporte de la DB";
        }
        else
            return "El transporte con el id ingresado no existe o fue eliminado"; 

    }
}
