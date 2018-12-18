<?php

namespace App\Http\Controllers;

use App\Habitacion;
use Illuminate\Http\Request;

class HabitacionesController extends Controller
{

    public function index()
    {
        $habitacion = Habitacion::all();
        return $habitacion;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $habitacion = Habitacion::create($request->all());
        $habitacion->save();
        return $habitacion;
    }

    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        return $habitacion;
    }

    public function edit(Habitacion $habitacion)
    {
        //
    }

    public function update(Request $request, Habitacion $habitacion)
    {
        //
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);
        $habitacion->delete();
        return "";
    }
}
