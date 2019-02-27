<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Beneficio_SeguroRequest;
use App\Beneficio_Seguro;
use App\Reserva;
use App\Seguro;


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
    public function adquirirSeguro()
    {
        $seguro = new Seguro;
        $reserva = new Reserva;

        $duracion_seguro = session()->get('diasDuracion_seguro');
        $inicio_seguro = session()->get('fechaInicio_seguro');
        $fin_seguro = session()->get('fechaFin_seguro');
        $destino_seguro = session()->get('destino_seguro');
        $personas_seguro = session()->get('numeroPasajeros_seguro');
        $costo_seguro = session()->get('costoFinalGrupal_seguro');
        $beneficios_seguro = session()->get('beneficiosSeleccionados_seguro');

        $seguro->precio_seguro = $costo_seguro;
        if($personas_seguro==1)
            $seguro->tipo_seguro = "individual";
        else
            $seguro->tipo_seguro = "grupal";

        $seguro->destino_seguro = $destino_seguro;
        $seguro->numero_pasajeros_seguros = $personas_seguro;
        $seguro->fecha_inicio_seguro = $inicio_seguro;
        $seguro->fecha_fin_seguro = $fin_seguro;
        $seguro->save();

        
        foreach($beneficios_seguro as $ben){
            $beneficio_seguro = new Beneficio_Seguro;
            $beneficio_seguro->id_seguro = $seguro->id;
            $beneficio_seguro->id_beneficio = $ben->id;
            $beneficio_seguro->save();
        }

        $reserva->monto_total_reserva=$costo_seguro;
        $reserva->check_in=null;
        $reserva->id_user=auth()->id();
        $reserva->id_seguro=$seguro->id;
        $reserva->id_promocion=null;
        $reserva->id_paquete=null;
        $reserva->transporte=false;
        $reserva->hospedaje=false;
        $reserva->vuelo=false;
        $reserva->save();
        return view('detalleReservaSeguro',compact('seguro'));

    }
}
