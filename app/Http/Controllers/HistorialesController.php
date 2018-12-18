<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;

class HistorialesController extends Controller
{

    public function index()
    {
        $historial = Historial::all();
        return $historial;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $historial = Historial::create($request->all());
        $historial->save();
        return "";
    }

    public function show($id)
    {
        $historial = Historial::find($id);
        return $historial;
    }

    public function edit(Historial $historial)
    {
        //
    }

    public function update(Request $request, Historial $historial)
    {
        //
    }

    public function destroy($id)
    {
        $historial = Historial::find($id);
        $historial->delete();
        return "";
    }
}
