<?php

namespace App\Http\Controllers;

use App\Pasajero;
use Illuminate\Http\Request;
use App\Http\Requests\PasajerosRequest;

class PasajerosController extends Controller
{

    public function index()
    {
        return Pasajero::all();
    }

    public function create()
    {
        //
    }

    public function store(PasajerosRequest $request)
    {
        $pasajero = Pasajero::create($request->all());
        $pasajero->save();
        return $pasajero;
    }

    public function show($id)
    { 
        return Pasajero::find($id);
    }

    public function edit(Pasajero $pasajero)
    {
        //
    }

    public function update(PasajerosRequest $request, $id)
    {
        $pasajero = Pasajero::find($id);
        $pasajero->fill($request->all());
        $pasajero->save();
        return $pasajero;
    }

    public function destroy($id)
    {
        Pasajero::find($id)->delete();
        return "Se ha eliminado el pasajero";
    }
}
