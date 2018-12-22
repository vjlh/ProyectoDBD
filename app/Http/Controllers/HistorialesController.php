<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use App\Http\Requests\HistorialesRequest;

class HistorialesController extends Controller
{

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
        return Historial::find($id);
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
        Historial::find($id)->delete();
        return "Se ha eliminado el historial";
    }
}
