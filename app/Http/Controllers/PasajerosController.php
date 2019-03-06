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

    public function store(Request $request)
    {
        $edad = $request->edad_pasajero;
        
        if($edad<=5){
            $tipo = "Bebé";
        }
        else if($edad>5 && $edad<=18){
            $tipo = 'Joven';
        }
        else if($edad>18 && $edad<=50){
            $tipo = 'Adulto';
        }
        else{
            $tipo = 'Adulto Mayor';
        }
        $pasajero = New Pasajero;
        $pasajero->nombre_pasajero = $request->nombre_pasajero;
        $pasajero->apellido_pasajero = $request->apellido_pasajero;
        $pasajero->edad_pasajero = $request->edad_pasajero;
        $pasajero->tipo_pasajero = $tipo;
        $pasajero->rut_pasajero = $request->rut_pasajero;
        $pasajero->pais_pasajero = $request->pais_pasajero;
        $pasajero->correo_pasajero = $request->correo_pasajero;
        //$pasajero = Pasajero::create($request->all());
        $pasajero->save();
        $num = session()->get('numPasajero_CheckIn') + 1;
        session()->put('numPasajero_CheckIn', $num);    
        if(session()->get('pasajerosId_CheckIn')==null){
            $id_pasajeros = [];
            array_push($id_pasajeros,$pasajero->id);
            session()->put('pasajerosId_CheckIn', $id_pasajeros);    
        }
        else{
            $id_existentes = session()->get('pasajerosId_CheckIn');
            array_push($id_existentes,$pasajero->id);
            session()->put('pasajerosId_CheckIn', $id_existentes);    
        }
        return back();

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

    public function update(Request $request, $id)
    {
        $pasajero = Pasajero::find($id);
        $edad = $request->edad_pasajero;

        if($edad<=5){
            $tipo = "Bebé";
        }
        else if($edad>5 && $edad<=18){
            $tipo = 'Joven';
        }
        else if($edad>18 && $edad<=50){
            $tipo = 'Adulto';
        }
        else{
            $tipo = 'Adulto Mayor';
        }
        $pasajero->nombre_pasajero = $request->nombre_pasajero;
        $pasajero->apellido_pasajero = $request->apellido_pasajero;
        $pasajero->edad_pasajero = $request->edad_pasajero;
        $pasajero->tipo_pasajero = $tipo;
        $pasajero->rut_pasajero = $request->rut_pasajero;
        $pasajero->pais_pasajero = $request->pais_pasajero;
        $pasajero->correo_pasajero = $request->correo_pasajero;

        $pasajero->save();

        return back();
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
