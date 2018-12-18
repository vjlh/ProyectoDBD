<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;

class ReservasController extends Controller
{

    public function index()
    {
        $reserva = Reserva::all();
        return $reserva;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $reserva = Reserva::create($request->all());
        $reserva->save();
        return "";
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        return $reserva;
    }

    public function edit(Reserva $reserva)
    {
        //
    }

    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();
        return "";
    }
}
