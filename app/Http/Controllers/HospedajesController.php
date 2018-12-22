<?php

namespace App\Http\Controllers;

use App\Hospedaje;
use Illuminate\Http\Request;
use App\Http\Requests\HospedajesRequest;

class HospedajesController extends Controller
{

    public function index()
    {
        return Hospedaje::all();
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
        return Hospedaje::find($id);
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
        Hospedaje::find($id)->delete();
        return "Se ha eliminado el hospedaje de la DB";
    }
}
