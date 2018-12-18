<?php

namespace App\Http\Controllers;

use App\Equipaje;
use Illuminate\Http\Request;

class EquipajesController extends Controller
{

    public function index()
    {
        $equipaje = Equipaje::all();
        return $equipaje;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $equipaje = Equipaje::create($request->all());
        $equipaje->save();
        return "";
    }

    public function show($id)
    {
        $equipaje = Equipaje::find($id);
        return $equipaje;
    }

    public function edit(Equipaje $equipaje)
    {
        //
    }

    public function update(Request $request, Equipaje $equipaje)
    {
        //
    }

    public function destroy($id)
    {
        $equipaje = Equipaje::find($id);
        $equipaje->delete();
        return "";
    }
}
