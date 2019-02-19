<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use App\Habitacion;
use App\Hospedaje;
use Illuminate\Http\Request;
use App\Http\Requests\HabitacionesRequest;

class HabitacionesController extends Controller
{

    public function index()
    { 
        $habitaciones_reservadas1 =  DB::table('habitaciones_reservas')->where('fecha_fin','<',$fecha_inicio)->select('id_habitacion')->get();                        
        $habitaciones_reservadas2 =  DB::table('habitaciones_reservas')->where('fecha_inicio','>',$fecha_fin)->select('id_habitacion')->get();                        
        
        $ids = [];
        $ids_NoDisponibles =[];

        foreach($habitaciones_reservadas1 as $tr1){
            array_push($ids,$tr1->id_habitacion);
        }
        foreach($habitaciones_reservadas2 as $tr2){
            array_push($ids,$tr2->id_habitacion);
        }

        $habitaciones_reservadas3 = DB::table('habitaciones_reservas')->whereNotIn('id_habitacion',$ids)->select('id_habitacion')->get();
        foreach($habitaciones_reservadas3 as $tr3){
            array_push($ids_NoDisponibles,$tr3->id_habitacion);
        }

        $habitaciones = Habitacion::all()->whereNotIn('id',$ids_NoDisponibles)
                                        ->where('id_hospedaje', '=' , request("id_hospedaje"));
        
        return view('habitaciones',compact('habitaciones'));
    }

    public function create()
    {
        //
    }

    public function store(HabitacionesRequest $request)
    {
        try{
            $id_hospedaje = $request->get('id_hospedaje');
            \App\Hospedaje::find($id_hospedaje)->id;

            $habitacion = Hospedaje::create($request->all());
            $habitacion->save();
            return $habitacion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $hospedaje = Hospedaje::find($id);
        $habitaciones = Habitacion::all()->where('id_hospedaje', '=' , $id)
                                         ->where('disponibilidad', '=' , 1);
        session()->put('id_hospedaje', $id);
        session()->put('hospedaje', $hospedaje);
        return view('habitaciones',compact('habitaciones'));
                 
    }

    public function edit(Habitacion $habitacion)
    {
        //
    }

    public function update(HabitacionesRequest $request, $id)
    {
        try{
            $id_hospedaje = $request->get('id_hospedaje');
            \App\Hospedaje::find($id_hospedaje)->id;

            $habitacion->fill($request->all());
            $habitacion->save();
            return $habitacion;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);
        if($habitacion != NULL)
        {
            $habitacion->delete();
            Habitacion::destroy($id);
            return "Se ha eliminado la habitacion de la DB";
        }
        else
            return "La habitacion con el id ingresado no existe o fue eliminado"; 
    }
}
