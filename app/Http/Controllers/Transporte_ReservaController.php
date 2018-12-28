<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Transporte_reservaRequest;
use App\Transporte_reserva;

class Transporte_ReservaController extends Controller
{
    //Probado
    public function index()
    {
        return Transporte_reserva::all();
    }

    public function create()
    {
        //
    }

    public function store(Transporte_reservaRequest $request)
    {
        try{
            $id_transporte = $request->get('id_transporte');
            \App\Transporte::find($id_transporte)->id;
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $tran_res = Transporte_reserva::create($request->all());
            $tran_res->save();
            return $tran_res;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $tran_res = Transporte_reserva::find($id);
        
        if($tran_res != NULL)
            return $tran_res;
        else 
            return "No existe un tan_res con la id ingresada";
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
