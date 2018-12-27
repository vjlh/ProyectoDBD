<?php

namespace App\Http\Controllers;

use App\Paquete;
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

    public function show($id)
    { 
        $paquete = Paquete::find($id);
        if($paquete != NULL)
            return $paquete;
        else
            return "El paquete con el id ingresado no existe o fue eliminado"; 

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
