<?php

namespace App\Http\Controllers;

use App\Avion;
use Illuminate\Http\Request;

class AvionesController extends Controller
{

    public function index()
    {
        $avion = Avion::all();
        return $avion;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $avion = Avion::create($request->all());
        $avion->save();
        return "";
    }

    public function show($id)
    {
        $avion = Avion::find($id);
        return $avion;
    }

    public function edit(Avion $avion)
    {
        //
    }

    public function update(Request $request, Avion $avion)
    {
        //
    }

    public function destroy($id)
    {
        $avion = Avion::find($id);
        $avion->delete();
        return "";
    }
}
