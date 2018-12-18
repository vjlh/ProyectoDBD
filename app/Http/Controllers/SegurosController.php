<?php

namespace App\Http\Controllers;

use App\Seguro;
use Illuminate\Http\Request;

class SegurosController extends Controller
{

    public function index()
    {
        $seguro = Seguro::all();
        return $seguro;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $seguro = Seguro::create($request->all());
        $seguro->save();
        return "";
    }

    public function show($id)
    {
        $seguro = Seguro::find($id);
        return $seguro;
    }

    public function edit(Seguro $seguro)
    {
        //
    }

    public function update(Request $request, Seguro $seguro)
    {
        //
    }

    public function destroy($id)
    {
        $seguro = Seguro::find($id);
        $seguro->delete();
        return "";
    }
}
