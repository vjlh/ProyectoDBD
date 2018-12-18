<?php

namespace App\Http\Controllers;

use App\Asiento;
use Illuminate\Http\Request;

class AsientosController extends Controller
{

    public function index()
    {
        $asiento = Asiento::all();
        return $asiento;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $asiento = Asiento::create($request->all());
        $asiento->save();
        return "";
    }

    public function show($id)
    {
        $asiento = Asiento::find($id);
        return $asiento;
    }

    public function edit(Asiento $asiento)
    {
        //
    }

    public function update(Request $request, Asiento $asiento)
    {
        //
    }

    public function destroy($id)
    {
        $asiento = Asiento::find($id);
        $asiento->delete();
        return "";
    }
}
