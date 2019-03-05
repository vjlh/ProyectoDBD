<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use App\Habitacion;
use App\Habitacion_Reserva;
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

  /*  public function store(HabitacionesRequest $request)
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
  */

    public function store(Request $request)
    {
        $habitacion = Habitacion::create($request->all());
        $habitacion->save();
        
        return back()->with('success_message','Agregado con éxito!');
 

    }

    public function show($id)
    {
        
        $hospedaje = Hospedaje::find($id);
        $fecha_inicio = session()->get('fecha_ida');
        $fecha_fin = session()->get('fecha_vuelta');
        
        $preHabitaciones = Habitacion::all()->where('id_hospedaje', '=', $id);
        $id_habitaciones = [];

        foreach($preHabitaciones as $hab){
            array_push($id_habitaciones, $hab->id);
        }
  
        $habitaciones_r = Habitacion_reserva::all()->whereIn('id_habitacion',$id_habitaciones);
    
        foreach ($habitaciones_r as $test){
            if($fecha_fin > $test->fecha_inicio && $fecha_fin < $test->fecha_fin){
                $clave = array_search($test->id_habitacion, $id_habitaciones);
                unset($id_habitaciones[$clave]);


            }
            if($fecha_inicio > $test->fecha_inicio && $fecha_inicio < $test->fecha_fin){
                $clave = array_search($test->id_habitacion, $id_habitaciones);
                unset($id_habitaciones[$clave]);
            }
        }
   
        $habitaciones = Habitacion::all()->whereIn('id',$id_habitaciones);
                                         
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

    public function update(Request $request, $id)
    {
        $habitacion = Habitacion::find($id);
        $outcome = $habitacion->fill($this->validate($request, [
            'precio' => 'required',
            'capacidad_habitacion' => 'required',
            'banio_privado' => 'required',
            'aire_acondicionado_habitacion' => 'required',
            'disponibilidad' => 'required',
            'tipo' => 'required',
            'id_hospedaje' => 'required',
        ]))->save();

        if ($outcome) {
            //dd("aqui");
            return back()->with('success_message','Actualizado con éxito!');
        } else {
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');
            //dd("aqui2");
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
