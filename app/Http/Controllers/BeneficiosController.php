<?php

namespace App\Http\Controllers;

use App\Beneficio;
use Illuminate\Http\Request;

class BeneficiosController extends Controller
{

    public function index()
    {
        $beneficio = Beneficio::all();
        return $beneficio;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $beneficio = Beneficio::create($request->all());
        $beneficio->save();
        return "";
    }

    public function show($id)
    {
        $beneficio = Beneficio::find($id);
        return $beneficio;
    }

    public function edit(Beneficio $beneficio)
    {
        //
    }

    public function update(Request $request, Beneficio $beneficio)
    {
        //
    }

    public function destroy($id)
    {
        $beneficio = Beneficio::find($id);
        $beneficio->delete();
        return "";
    }
}
