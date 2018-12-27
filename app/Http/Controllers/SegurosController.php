<?php

namespace App\Http\Controllers;

use App\Seguro;
use Illuminate\Http\Request;
use App\Http\Requests\SegurosRequest;

class SegurosController extends Controller
{

    public function index()
    {
        $seguro = Seguro::all();
        return $seguro;
    }

    public function create()
    {
        //
    }

    public function store(SegurosRequest $request)
    {
        $seguro = Seguro::create($request->all());
        $seguro->save();
        return $seguro;
    }

    public function show($id)
    {
        $seguro = Seguro::find($id);
        if($seguro!=NULL)
            return $seguro;
        else
            return "El seguro con el id ingresado no existe o fue eliminado"; 

    }

    public function edit(Seguro $seguro)
    {
        //
    }

    public function update(SegurosRequest $request, $id)
    {
        $seguro = Seguro::find($id);
        $seguro->fill($request->all());
        $seguro->save();
        return $seguro;
    }

    public function destroy($id)
    {
        $seguro = Seguro::find($id);
        if($seguro!=NULL)
        {
            $seguro->delete();
            Seguro::destroy($id);
            return "Se ha eliminado el seguro de la DB";
        }
        else
            return "El seguro con el id ingresado no existe o fue eliminado"; 
    }
}
