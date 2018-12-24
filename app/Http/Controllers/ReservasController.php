<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;
use App\Http\Requests\ReservasRequest;

class ReservasController extends Controller
{

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

            $reserva = Reserva::create($request->all());
            $reserva->save();
            return $reserva;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        return $reserva;
    }

    public function edit(Reserva $reserva)
    {
        //
    }

    public function update(ReservasRequest $request, $id)
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
        $reserva->delete();
        return "Se ha eliminado la reserva de la DB";
    }
}
