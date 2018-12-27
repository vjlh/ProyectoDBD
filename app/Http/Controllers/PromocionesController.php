<?php

namespace App\Http\Controllers;

use App\Promocion;
use Illuminate\Http\Request;
use App\Http\Requests\PromocionesRequest;

class PromocionesController extends Controller
{
    //Probado
    public function index()
    {
        $promocion = Promocion::all();
        return $promocion;
    }

    public function create()
    {
        //
    }

    public function store(PromocionesRequest $request)
    {
        $promocion = Promocion::create($request->all());
        $promocion->save();
        return $promocion;
    }

    public function show($id)
    {
        $promocion = Promocion::find($id);
        if ($promocion != NULL)
            return $promocion;
        else
            return "La promocion con el id ingresado no existe o fue eliminado"; 
    }

    public function edit(Promocion $promocion)
    {
        //
    }

    public function update(PromocionesRequest $request, $id)
    {
        $promocion = Promocion::find($id);
        $promocion->fill($request->all());
        $promocion->save();
        return $promocion;
    }

    public function destroy($id)
    {
        $promocion = Promocion::find($id);
        if($promocion!=NULL)
        {
            $promocion->delete();
            Promocion::destroy($id);
            return "Se ha eliminado la promoción";
        }
        else
            return "La promocion con el id ingresado no existe o fue eliminado"; 

    }
}
