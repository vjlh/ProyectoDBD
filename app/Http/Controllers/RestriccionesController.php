<?php

namespace App\Http\Controllers;

use App\Restriccion;
use Illuminate\Http\Request;

class RestriccionesController extends Controller
{

    public function index()
    {
        $restriccion = Restriccion::all();
        return $restriccion;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $restriccion = Restriccion::create($request->all());
        $restriccion->save();
        return "";
    }

    public function show($id)
    {
        $restriccion = Restriccion::find($id);
        return $restriccion;
    }

    public function edit(Restriccion $restriccion)
    {
        //
    }

    public function update(Request $request, Restriccion $restriccion)
    {
        //
    }

    public function destroy($id)
    {
        $restriccion = Restriccion::find($id);
        $restriccion->delete();
        return "";
    }
}
