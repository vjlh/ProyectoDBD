<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;
use Validator;

class AdministradoresController extends Controller
{
    public function reglas(){
        return[
        'id_user' => 'required|numeric'
        ];
    }
    public function index()
    {
        return Administrador::all();
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
        $Administrador = new Administrador;
        try{
            $id = $request->get('id_user');
            $Administrador->id_user = \App\User::find($id)->id;
            $Administrador->save();
            return $Administrador;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $administrador = Administrador::find($id);
        return $administrador;
    }

    public function edit(Administrador $administrador)
    {
        //
    }

    public function update(Request $request, Administrador $administrador)
    {
        $validator = Validator::make($request->all(),$this->reglas());
        if($validator->fails()){
            return json_encode(['Datos Mal ingresados' => 'Error']);
        }

        try{
            $id = $request->get('id_user');
            $administrador->id_user = \App\User::find($id)->id;
            $administrador->save();
            return $administrador;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $administrador = Administrador::find($id);
        $administrador->delete();
        return "";
    }
}
