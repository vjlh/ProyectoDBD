<?php

namespace App\Http\Controllers;

use App\Hospedaje;
use Illuminate\Http\Request;
use App\Http\Requests\HospedajesRequest;

class HospedajesController extends Controller
{
    //probado
    public function index()
    {
        $hospedajes = Hospedaje::all()->where('ubicacion','=',request('ciudad_origen'))
                                    ->where('cantidad_disponible','>=',request('num_habitaciones'));
        
        return view('hospedajes',compact('hospedajes'));
    }

    public function create()
    {
        //
    }

    public function store(HospedajesRequest $request)
    {
        $hospedaje = Hospedaje::create($request->all());
        $hospedaje->save();
        return $hospedaje;
    }

    public function show($id)
    {
        $hospedaje = Hospedaje::find($id);
        if($hospedaje != NULL)
            return $hospedaje;
        else
            return "El hospedaje con el id ingresado no existe o fue eliminado"; 
        
    }

    public function edit(Hospedaje $hospedaje)
    {
        //
    }

    public function update(HospedajesRequest $request, $id)
    {
        $hospedaje = Hospedaje::find($id);
        $hospedaje->fill($request->all());
        $hospedaje->save();
        return $hospedaje;
    }

    public function destroy($id)
    {
        $hospedaje = Hospedaje::find($id);
        if($hospedaje != NULL)
        {
            $hospedaje->delete();
            Hospedaje::destroy($id);
            return "Se ha eliminado el hospedaje de la DB";
        }
        else
            return "El hospedaje con el id ingresado no existe o fue eliminado"; 

    }
}
