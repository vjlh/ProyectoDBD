<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Beneficio_SeguroRequest;
use App\Beneficio_Seguro;


class Beneficio_SeguroController extends Controller
{
    //Probado
    public function index()
    {
        return Beneficio_Seguro::all();
    }

    public function create()
    {
        //
    }

    public function store(Beneficio_SeguroRequest $request)
    {
        try{
            $id_beneficio = $request->get('id_beneficio');
            \App\Beneficio::find($id_beneficio)->id;
            $id_seguro = $request->get('id_seguro');
            \App\Seguro::find($id_seguro)->id;

            $ben_seg = Beneficio_Seguro::create($request->all());
            $ben_seg->save();
            return $ben_seg;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $ben_seg = Beneficio_Seguro::find($id);
        
        if($ben_seg != NULL)
            return $ben_seg;
        else 
            return "No existe un bs con la id ingresada";
    }

    public function edit(Beneficio_Seguro $ben_seg)
    {
        //
    }

    public function update(Beneficio_SeguroRequest $request, $id)
    {
        $ben_seg = Beneficio_Seguro::find($id);
        try{
            $id_beneficio = $request->get('id_beneficio');
            \App\Beneficio::find($id_beneficio)->id;
            $id_seguro = $request->get('id_seguro');
            \App\Seguro::find($id_seguro)->id;

            $ben_seg->fill($request->all());
            $ben_seg->save();
            return $ben_seg;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $ben_seg = Beneficio_Seguro::find($id);
        if($ben_seg != NULL){
            $ben_seg->delete();
            Beneficio_Seguro::destroy($id);
            return "El bs se ha eliminado";
        }
        else
            return "No existe un bs con la id ingresada";
    }
    
}
