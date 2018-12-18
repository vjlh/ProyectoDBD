<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;

class AdministradoresController extends Controller
{

    public function index()
    {
        
    }

    public function create()
    {
        $administrador = Administrador:all();
        return $administrador;
    }

    public function store(Request $request)
    {
        $administrador = Administrador::create($request->all());
        $administrador->save();
        return "";
    }

    public function show($id)
    {
        $administrador = Administrador::find($id);
        return $administrador;
    }

    public function edit(Administrador $administrador)
    {
        //
    }

    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    public function destroy($id)
    {
        $administrador = Administrador::find($id);
        $administrador->delete();
        return "";
    }
}
