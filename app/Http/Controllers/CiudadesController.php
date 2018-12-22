<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadesRequest;

class CiudadesController extends Controller
{

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
        return Ciudad::find($id);
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
        Ciudad::find($id)->delete();
        return "Se ha eliminado la ciudad";
    }
}
