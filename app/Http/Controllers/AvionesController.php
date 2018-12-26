<?php

namespace App\Http\Controllers;

use App\Avion;
use Illuminate\Http\Request;
use App\Http\Requests\AvionesRequest;

class AvionesController extends Controller
{
    //Probado
    public function index()
    {
        return Avion::all();
    }

    public function create()
    {
        //
    }

    public function store(AvionesRequest $request)
    {
        $avion = Avion::create($request->all());
        $avion->save();
        return $avion;

    }

    public function show($id)
    { 
        $avion = Avion::find($id);
        if($avion != NULL)
            return $avion;
        else
            return "No existe avión con la id ingresada";    
    }

    public function edit(Avion $avion)
    {
        //
    }

    public function update(AvionesRequest $request, $id)
    {
        $avion = Avion::find($id);
        $avion->fill($request->all());
        $avion->save();
        return $avion;

    }

    public function destroy($id)
    {
        $avion = Avion::find($id);
        if($avion != NULL){

            $avion->delete();
            Avion::destroy($id);
            return "El avion se ha eliminado";
        }
        else
            return "El avion con el id ingresado no existe o ya fue eliminado";
        
    }
}
