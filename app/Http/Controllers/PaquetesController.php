<?php

namespace App\Http\Controllers;

use App\Paquete;
use Illuminate\Http\Request;
use App\Http\Requests\PaquetesRequest;

class PaquetesController extends Controller
{

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
        return Paquete::find($id);
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
        Paquete::find($id)->delete();
        return "Se ha eliminado el paquete de la DB";
    }
}
