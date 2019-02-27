<?php

namespace App\Http\Controllers;

use App\Hospedaje;
use App\Paquete;
use App\Vuelo;
use Illuminate\Http\Request;
use App\Http\Requests\HospedajesRequest;
use Carbon\Carbon;

class HospedajesController extends Controller
{
    //probado
    public function index()
    {
        $fecha_ida = Carbon::parse(request('fecha_ida'));
        $fecha_vuelta = Carbon::parse(request('fecha_vuelta'));
        $diasDiferencia = $fecha_vuelta->diffInDays($fecha_ida);

        $ciudad_hospedaje= request('ciudad_origen');
        $numHabitaciones= request('num_habitaciones');
        $numero_personas= request('numero_personas');

        $hospedajes = Hospedaje::all()->where('ubicacion','=',$ciudad_hospedaje)
                                      ->where('cantidad_disponible','>=',$numHabitaciones);
        $hospedajesUbicacion = [];
        foreach($hospedajes as $hospedaje){
            array_push($hospedajesUbicacion, $hospedaje->id);
        }
        if(!empty($hospedajesUbicacion)){
            session()->put('diasDiferencia', $diasDiferencia);
            session()->put('fecha_ida', $fecha_ida);
            session()->put('fecha_vuelta', $fecha_vuelta);
            session()->put('ciudad_hospedaje', $ciudad_hospedaje);
            session()->put('numHabitaciones', $numHabitaciones);
            session()->put('numero_personas', $numero_personas);
            $paquete = NULL;
            return view('seleccion_hospedajes',compact('hospedajes','paquete'));
        }
        else{
            return \Redirect::back()->with('statusCity','statusCity');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $hospedaje = Hospedaje::create($request->all());
        $hospedaje->save();
        
        return back()->with('success_message','Agregado con éxito!');
 

    }

    public function show($id)
    {
        $hospedaje = Hospedaje::find($id);
        if($hospedaje != NULL)
            return $hospedaje;
        else
            return "El hospedaje con el id ingresado no existe o fue eliminado"; 
        
    }

    public function edit(Hospedaje $hospedaje)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $hospedaje = Hospedaje::find($id);
        $outcome = $hospedaje->fill($this->validate($request, [
            'ubicacion' => 'required',
            'nombre_hospedaje' => 'required',
            'cadena_hospedaje' => 'required',
            'cantidad_disponible' => 'required',
            'estrellas_hospedaje' => 'required',
            'piscina_hospedaje' => 'required',
            'sauna_hospedaje' => 'required',
            'zona_infantil_hospedaje' => 'required',
            'gimnasio_hospedaje' => 'required',
            
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
        $hospedaje = Hospedaje::find($id);
        if($hospedaje != NULL)
        {
            $hospedaje->delete();
            Hospedaje::destroy($id);
            return back()->with('success_message','Se ha eliminado el hotel con éxito!');
        }
        else
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');

    }

    public function obtenerAlojamientoPaquete($id){
        $paquete = Paquete::find($id);
        $ciudad_origen = request('ciudad_origen_vuelo');
        $num_pasajeros = request('num_pasajeros');
        $vuelosPosibles = Vuelo::all()
            ->where('origen_vuelo', '=', $ciudad_origen)
            ->where('destino_vuelo', '=', $paquete->destino_paquete)
            ->where('fecha_vuelo', '=', $paquete->fecha_paquete);
        $vuelos = [];
        foreach ($vuelosPosibles as $vuelo) {
            array_push($vuelos,$vuelo);
        }
        $len = sizeof($vuelos);
        $element = rand(0,$len-1);
        $fecha_inicio = $paquete->fecha_paquete;
        $fecha_fin = date('Y-m-d', strtotime($paquete->fecha_paquete. ' + ' .$paquete->num_dias. ' days'));
        $hospedajes = Hospedaje::all()->where('ubicacion','=',$paquete->destino_paquete);
        
        return View('hospedajes',['paquete' => $paquete, 'hospedajes' => $hospedajes, 'vuelo' => $vuelo, 'num_pasajeros' => $num_pasajeros]);
    }
}
