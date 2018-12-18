<?php

namespace App\Http\Controllers;

use App\Transporte;
use Illuminate\Http\Request;

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

    public function store(Request $request)
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

    public function update(Request $request, Transporte $transporte)
    {
        //
    }

    public function destroy($id)
    {
        $transporte = Transporte::find($id);
        $transporte->delete();
        return "";
    }
}
