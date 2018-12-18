<?php

namespace App\Http\Controllers;

use App\Aeropuerto;
use Illuminate\Http\Request;

class AeropuertosController extends Controller
{

    public function index()
    {
        $aeropuerto = Aeropuerto::all();
        return $aeropuerto;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $aeropuerto = Aeropuerto::create($request->all());
        $aeropuerto->save();
        return "";
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
        //
    }

    public function destroy($id)
    {
        $aeropuerto = Aeropuerto::find($id);
        $aeropuerto->delete();
        return "";
    }
}
