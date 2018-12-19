<?php

namespace App\Http\Controllers;

use App\Promocion;
use Illuminate\Http\Request;

class PromocionesController extends Controller
{

    public function index()
    {
        $promocion = Promocion::all();
        return $promocion;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $promocion = Promocion::create($request->all());
        $promocion->save();
        return "";
    }

    public function show($id)
    {
        $promocion = Promocion::find($id);
        return $promocion;
    }

    public function edit(Promocion $promocion)
    {
        //
    }

    public function update(Request $request, Promocion $promocion)
    {
        //
    }

    public function destroy($id)
    {
        $promocion = Promocion::find($id);
        $promocion->delete();
        return "";
    }
}
