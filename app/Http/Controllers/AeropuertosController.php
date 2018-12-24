<?php

namespace App\Http\Controllers;

use App\Aeropuerto;
use Illuminate\Http\Request;
use Validator;

class AeropuertosController extends Controller
{
    public function reglas(){
        return [
            'nombre_aeropuerto' => 'required|string',
            'direccion_aeropuerto' => 'required|string',
            'telefono_aeropuerto' => 'required|numeric'
            'pagina_web' => 'required|string',
            'id_ciudad' => 'required|numeric'
        ];
    }

    public function index()
    {
        return Aeropuerto::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->reglas());
        if($validator->fails()){
            return json_encode(['Datos Mal ingresados' => 'Error']);
        }
        $aeropuerto = new Aeropuerto;
        try{
            $id_ciudad = $request->get('id_ciudad');
            $aeropuerto->id_ciudad = \App\User::find($id)->id_ciudad;
            $aeropuerto->nombre_aeropuerto = $request->get('nombre_aeropuerto');
            $aeropuerto->direccion_aeropuerto = $request->get('direccion_aeropuerto');
            $aeropuerto->telefono_aeropuerto = $request->get('telefono_aeropuerto');
            $aeropuerto->pagina_web = $request->get('pagina_web');
            $aeropuerto->save();
            return $aeropuerto;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $aeropuerto = Aeropuerto::find($id);
        return $aeropuerto;
    }

    public function edit(Aeropuerto $aeropuerto)
    {
        //
    }

    public function update(Request $request, Aeropuerto $aeropuerto)
    {
        $validator = Validator::make($request->all(),$this->reglas());
        if($validator->fails()){
            return json_encode(['Datos Mal ingresados' => 'Error']);
        }

        try{
            $id_ciudad = $request->get('id_ciudad');
            $aeropuerto->id_ciudad = \App\User::find($id)->id_ciudad;
            $aeropuerto->nombre_aeropuerto = $request->get('nombre_aeropuerto');
            $aeropuerto->direccion_aeropuerto = $request->get('direccion_aeropuerto');
            $aeropuerto->telefono_aeropuerto = $request->get('telefono_aeropuerto');
            $aeropuerto->pagina_web = $request->get('pagina_web');
            return $aeropuerto;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $aeropuerto = Aeropuerto::find($id);
        $aeropuerto->delete();
        return "";
    }
}
