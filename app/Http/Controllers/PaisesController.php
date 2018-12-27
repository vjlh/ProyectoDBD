<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;
use App\Http\Requests\PaisesRequest;

class PaisesController extends Controller
{
    //Probado
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pais::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisesRequest $request)
    {
        $pais = Pais::create($request->all());
        $pais->save();
        return $pais;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Pais::find($id);
        if($pais != NULL)
            return $pais;
        else
            return "El país con el id ingresado no existe o fue eliminado"; 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit(Pais $pais)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(PaisesRequest $request, $id)
    {
        $pais = Pais::find($id);
        $pais->fill($request->all());
        $pais->save();
        return $pais;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = Pais::find($id);
        if($pais != NULL)
        {
            $pais->delete();
            Pais::destroy($id);
            return "Se ha eliminado el pais de la DB";
        }
        else
            return "El país con el id ingresado no existe o fue eliminado"; 

    }
}
