<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadesRequest;

class CiudadesController extends Controller
{
    //Probado
    public function index()
    {
        return Ciudad::all();
    }

    public function create()
    {
        //
    }

    public function store(CiudadesRequest $request)
    {
        try{
            $id_pais = $request->get('id_pais');
            \App\Pais::find($id_pais)->id;

            $ciudad = Ciudad::create($request->all());
            $ciudad->save();
            return $ciudad;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $ciudad = Ciudad::find($id);
        if($ciudad != NULL)
            return $ciudad;
        else
            return "No existe una ciudad con el id ingresado";    
    }

    public function edit(Ciudad $ciudad)
    {
        //
    }

    public function update(CiudadesRequest $request,$id)
    {
        $ciudad = Ciudad::find($id);
        try{
            $id_pais = $request->get('id_pais');
            \App\Pais::find($id_pais)->id;

            $ciudad->fill($request->all());
            $ciudad->save();
            return $ciudad;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $ciudad = Ciudad::find($id);
        if($ciudad !=NULL)
        {
            $ciudad->delete();
            Ciudad::destroy($id);
            return "Se ha eliminado la ciudad";
        }
        else
            return "La ciudad con el id ingresado no existe o ya fue eliminado";

    }
}
