<?php

namespace App\Http\Controllers;

use App\Beneficio;
use Illuminate\Http\Request;
use App\Http\Requests\BeneficiosRequest;

class BeneficiosController extends Controller
{

    public function index()
    {
        return Beneficio::all();
    }

    public function create()
    {
        //
    }

    public function store(BeneficiosRequest $request)
    {
        $beneficio = Beneficio::create($request->all());
        $beneficio->save();
        return $beneficio;
    }

    public function show($id)
    {
        return Beneficio::find($id);
    }

    public function edit(Beneficio $beneficio)
    {
        //
    }

    public function update(BeneficiosRequest $request, $id)
    {
        $beneficio = Beneficio::find($id);
        $beneficio->fill($request->all());
        $beneficio->save();
        return $beneficio;
    }

    public function destroy($id)
    {
        Beneficio::find($id)->delete();
        return "El beneficio se ha eliminado";
    }
}
