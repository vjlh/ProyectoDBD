<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use App\Http\Requests\HistorialesRequest;

class HistorialesController extends Controller
{
    //Probado
    public function index()
    {
        return Historial::all();
    }

    public function create()
    {
        //
    }

    public function store(HistorialesRequest $request)
    {
        try{
            $id_user = $request->get('id_user');
            \App\User::find($id_user)->id;

            $historial = Historial::create($request->all());
            $historial->save();
            return $historial;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $historial = Historial::find($id);
        if($historial != NULL)
            return $historial;
        else
            return "El historial con el id ingresado no existe o fue eliminado"; 
    }

    public function edit(Historial $historial)
    {
        //
    }

    public function update(HistorialesRequest $request, $id)
    {
        $historial = Historial::find($id);
        try{
            $id_user = $request->get('id_user');
            \App\User::find($id_user)->id;

            $historial->fill($request->all());
            $historial->save();
            return $historial;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $historial = Historial::find($id);
        if($historial != NULL)
        {
            $historial->delete();
            Historial::destroy($id);
            return "Se ha eliminado el historial";
        }
        else
            return "El historial con el id ingresado no existe o fue eliminado"; 
            
    }
}
