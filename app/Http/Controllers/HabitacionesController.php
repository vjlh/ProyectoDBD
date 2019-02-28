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
        //
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
        $fecha_inicio = session()->get('fecha_ida');
        $fecha_fin = session()->get('fecha_vuelta');

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
                                        ->where('id_hospedaje', '=' , $id);
        $habitacionesAux = [];
        foreach($habitaciones as $habitacion){
            array_push($habitacionesAux,$habitacion);
        }
        if(!empty($habitacionesAux)){
            session()->put('hospedaje', $hospedaje);
            return view('reservar_habitaciones',compact('habitaciones'));
        }
        else{
            return \Redirect::back()->with('statusHabitaciones','No existen habitaciones disponibles en la fecha indicada.');
        }
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
            return back()->with('success_message','Se ha eliminado la habitación con éxito!');
        }
        else
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');

    }
}
