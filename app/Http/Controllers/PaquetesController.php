<?php

namespace App\Http\Controllers;

use App\Paquete;
use App\Reserva;
use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Requests\PaquetesRequest;

class PaquetesController extends Controller
{
    //Probado
    public function index()
    {
        return Paquete::all();
    }

    public function create()
    {
        //
    }

    public function store(PaquetesRequest $request)
    {
        $paquete = Paquete::create($request->all());
        $paquete->save();
        return $paquete;
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

        return view('welcome',compact('ciudades'));

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

    public function update(PaquetesRequest $request, $id)
    {
        $paquete = Paquete::find($id);
        $paquete->fill($request->all());
        $paquete->save();
        return $paquete;
    }

    public function destroy($id)
    {
        $paquete = Paquete::find($id);
        if($paquete!=NULL)
        {
            $paquete->delete();
            Paquete::destroy($id);
            return "Se ha eliminado el paquete de la DB";
        }
        else
            return "El paquete con el id ingresado no existe o fue eliminado"; 

    }
}
