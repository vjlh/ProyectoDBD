<?php

namespace App\Http\Controllers;

use App\Vuelo;
use App\Avion;
use App\Paquete;
use Illuminate\Http\Request;
use App\Http\Requests\VuelosRequest;

class VuelosController extends Controller
{

    public function index()
    {
        $origen = request("ciudad_origen");
        $destino = request("ciudad_destino");
        $fecha_viaje = request("fecha_vuelo");
        $num_pasajeros = request("num_pasajeros");
        if(($destino != "") && ($origen == "")){
            $vuelos = Vuelo::all()->where('destino_vuelo', '=' , $destino)
                                  ->where('fecha_viaje', '>=' , $fecha_viaje)
                                  ->where('cantidad_disponible', '>=', $num_pasajeros);
            $vuelosAux = [];
            foreach($vuelos as $vuelo){
                array_push($vuelosAux,$vuelo->id);
            }
            if(!empty($vuelosAux)){
                return view('vuelos',compact('vuelos','num_pasajeros'));
            }
            else{
                return \Redirect::back()->with('statusVuelos','No hay vuelos disponibles.');
            }
        }
        
        elseif(($destino == "") && ($origen != "")){
            $vuelos = Vuelo::all()->where('origen_vuelo', '=' , $origen)
                                  ->where('fecha_viaje', '>=' , $fecha_viaje)
                                  ->where('cantidad_disponible', '>=', $num_pasajeros);
            $vuelosAux = [];
            foreach($vuelos as $vuelo){
                array_push($vuelosAux,$vuelo->id);
            }
            if(!empty($vuelosAux)){
                return view('vuelos',compact('vuelos','num_pasajeros'));
            }
            else{
                return \Redirect::back()->with('statusVuelos','No hay vuelos disponibles.');
            }
        }
        else{
            $vuelos = Vuelo::all()->where('origen_vuelo', '=' , $origen)
                                  ->where('destino_vuelo', '=' , $destino)
                                  ->where('fecha_viaje', '>=' , $fecha_viaje)
                                  ->where('cantidad_disponible', '>=', $num_pasajeros);
            $vuelosAux = [];
            foreach($vuelos as $vuelo){
                array_push($vuelosAux,$vuelo->id);
            }
            if(!empty($vuelosAux)){
                return view('vuelos',compact('vuelos','num_pasajeros'));
            }
            else{
                return \Redirect::back()->with('statusVuelos','No hay vuelos disponibles.');
            }
        }
                            
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $vuelo = Vuelo::create($request->all());
        $avion = Avion::find($vuelo->id_avion);
        $vuelo->cantidad_disponible = $avion->capacidad_avion;
        $vuelo->save();
        $vuelos = Vuelo::All();
        $vuelos->sortBy('id');
        
        return back()->with('success_message','Agregado con éxito!');
 

    }

    public function show($id)
    {
        $vuelo = Vuelo::find($id);
        if($vuelo!=NULL)
            return $vuelo;
        else
            return "El vuelo con el id ingresado no existe o fue eliminado";  
    }

    public function edit(Vuelo $vuelo)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $vuelo = Vuelo::find($id);
        $outcome = $vuelo->fill($this->validate($request, [
            'hora_vuelo' => 'required',
            'duracion_vuelo' => 'required',
            'fecha_vuelo' => 'required',
            'origen_vuelo' => 'required',
            'destino_vuelo' => 'required',
            'id_avion' => 'required',
            'id_aeropuerto' => 'required',
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
        $vuelo = Vuelo::find($id);
        if($vuelo!=NULL)
        {
            $vuelo->delete();
            Vuelo::destroy($id);
            return back()->with('success_message','Se ha eliminado el vuelo con éxito!');
        }
        else
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');

    }
    public function filtrarVuelos(Request $request){
        $origen = $request->get('ciudad_origen');        
        $destino = $request->get('ciudad_destino');
        $fecha = $request->get('fecha_viaje');

        $vuelos = \DB::table('vuelos')
        ->where('destino_vuelo',$destino)
        ->where('origen_vuelo',$origen)
        ->where('fecha_vuelo',$fecha)
        ->get();

        return view('vuelos',compact('vuelos'));
        
    }
}
