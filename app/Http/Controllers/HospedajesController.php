<?php

namespace App\Http\Controllers;

use App\Hospedaje;
use Illuminate\Http\Request;

class HospedajesController extends Controller
{

    public function index()
    {
        $hospedaje = Hospedaje::all();
        return $hospedaje;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $hospedaje = Hospedaje::create($request->all());
        $hospedaje->save();
        return "";
    }

    public function show($id)
    {
        $hospedaje = Hospedaje::find($id);
        return $hospedaje;
    }

    public function edit(Hospedaje $hospedaje)
    {
        //
    }

    public function update(Request $request, Hospedaje $hospedaje)
    {
        //
    }

    public function destroy($id)
    {
        $hospedaje = Hospedaje::find($id);
        $hospedaje->delete();
        return "";
    }
}
