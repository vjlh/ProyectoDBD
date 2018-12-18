<?php

namespace App\Http\Controllers;

use App\Pasajero;
use Illuminate\Http\Request;

class PasajerosController extends Controller
{

    public function index()
    {
        $pasajero = Pasajero::all();
        return $pasajero;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $pasajero = Pasajero::create($request->all());
        $pasajero->save();
        return $pasajero;
    }

    public function show($id)
    {
        $pasajero = Pasajero::find($id);
        return $pasajero;
    }

    public function edit(Pasajero $pasajero)
    {
        //
    }

    public function update(Request $request, Pasajero $pasajero)
    {
        //
    }

    public function destroy($id)
    {
        $pasajero = Pasajero::find($id);
        $pasajero->delete();
        return "";
    }
}
