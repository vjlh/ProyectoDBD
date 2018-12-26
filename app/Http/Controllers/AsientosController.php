<?php

namespace App\Http\Controllers;

use App\Asiento;
use Illuminate\Http\Request;
use App\Http\Requests\AsientosRequest;

class AsientosController extends Controller
{
    //Probado
    public function index()
    {
        return Asiento::all();
    }

    public function create()
    {
        //
    }

    public function store(AsientosRequest $request)
    {

        try{
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;
            $id_avion = $request->get('id_avion');
            \App\Avion::find($id_avion)->id;

            $asiento = Asiento::create($request->all());
            $asiento->save();
            return $asiento;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function show($id)
    {
        $asiento = Asiento::find($id);
        if($asiento!=NULL)
            return $asiento;
        
        else
            return "No existe asiento con la id ingresada";
    }

    public function edit(Asiento $asiento)
    {
        //
    }

    public function update(AsientosRequest $request, $id)
    {
        $asiento = Asiento::find($id);
        try{
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;
            $id_avion = $request->get('id_avion');
            \App\Avion::find($id_avion)->id;

            $asiento->fill($request->all());
            $asiento->save();
            return $asiento;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $asiento = Asiento::find($id);
        if($asiento != NULL)
        {
            $asiento->delete();
            Asiento::destroy($id);
            return "El asiento ha sido eliminado";
        }
        else
            return "El asiento con el id ingresado no existe o ya fue eliminado";
        
    }
}
