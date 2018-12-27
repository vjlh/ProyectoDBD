<?php

namespace App\Http\Controllers;

use App\Pasajero;
use Illuminate\Http\Request;
use App\Http\Requests\PasajerosRequest;

class PasajerosController extends Controller
{
    //Probado
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
        $pasajero = Pasajero::find($id);
        if($pasajero != NULL)
            return $pasajero;
        else
            return "El pasajero con el id ingresado no existe o fue eliminado"; 

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
        $pasajero = Pasajero::find($id);
        if($pasajero != NULL)
        {    
            $pasajero->delete();
            Pasajero::destroy($id);
            return "Se ha eliminado el pasajero";
        }
        else   
            return "El pasajero con el id ingresado no existe o fue eliminado"; 

    }
}
