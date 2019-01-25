<?php

namespace App\Http\Controllers;

use App\Hospedaje;
use Illuminate\Http\Request;
use App\Http\Requests\HospedajesRequest;
use Carbon\Carbon;

class HospedajesController extends Controller
{
    //probado
    public function index()
    {
        $fecha_ida = Carbon::parse(request('fecha_ida'));
        $fecha_vuelta = Carbon::parse(request('fecha_vuelta'));
        $diasDiferencia = $fecha_vuelta->diffInDays($fecha_ida);

        $ciudad_hospedaje= request('ciudad_origen');
        $numHabitaciones= request('num_habitaciones');
        $numero_personas= request('numero_personas');

        $hospedajes = Hospedaje::all()->where('ubicacion','=',$ciudad_hospedaje)
                                      ->where('cantidad_disponible','>=',$numHabitaciones);
        
        session()->put('diasDiferencia', $diasDiferencia);
        session()->put('fecha_ida', $fecha_ida);
        session()->put('fecha_vuelta', $fecha_vuelta);
        session()->put('ciudad_hospedaje', $ciudad_hospedaje);
        session()->put('numHabitaciones', $numHabitaciones);
        session()->put('numero_personas', $numero_personas);

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
