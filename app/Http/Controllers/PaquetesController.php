<?php

namespace App\Http\Controllers;

use App\Paquete;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{

    public function index()
    {
        $paquete = Paquete::all();
        return $paquete;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $paquete = Paquete::create($request->all());
        $paquete->save();
        return "";
    }

    public function show($id)
    {
        $paquete = Paquete::find($id);
        return $paquete;
    }

    public function edit(Paquete $paquete)
    {
        //
    }

    public function update(Request $request, Paquete $paquete)
    {
        //
    }

    public function destroy($id)
    {
        $paquete = Paquete::find($id);
        $paquete->delete();
        return "";
    }
}
