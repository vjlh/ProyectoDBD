<?php

namespace App\Http\Controllers;

use App\Vuelo;
use Illuminate\Http\Request;

class VuelosController extends Controller
{

    public function index()
    {
        $vuelo = Vuelo::all();
        return $vuelo;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $vuelo = Vuelo::create($request->all());
        $vuelo->save();
        return "";
    }

    public function show($id)
    {
        $vuelo = Vuelo::find($id);
        return $vuelo;
    }

    public function edit(Vuelo $vuelo)
    {
        //
    }

    public function update(Request $request, Vuelo $vuelo)
    {
        //
    }

    public function destroy($id)
    {
        $vuelo = Vuelo::find($id);
        $vuelo->delete();
        return "";
    }
}
