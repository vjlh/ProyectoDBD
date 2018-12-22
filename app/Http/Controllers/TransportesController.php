<?php

namespace App\Http\Controllers;

use App\Transporte;
use Illuminate\Http\Request;
use App\Http\Requests\TransportesRequest;

class TransportesController extends Controller
{

    public function index()
    {
        $transporte = Transporte::all();
        return $transporte;
    }

    public function create()
    {
        //
    }

    public function store(TransportesRequest $request)
    {
        $transporte = Transporte::create($request->all());
        $transporte->save();
        return $transporte;
    }

    public function show($id)
    {
        $transporte = Transporte::find($id);
        return $transporte;
    }

    public function edit(Transporte $transporte)
    {
        //
    }

    public function update(TransportesRequest $request, $id)
    {
        $transporte = Transporte::find($id);
        $transporte->fill($request->all());
        $transporte->save();
        return $transporte;
    }

    public function destroy($id)
    {
        $transporte = Transporte::find($id);
        $transporte->delete();
        return "Se ha eliminado el transporte de la DB";
    }
}
