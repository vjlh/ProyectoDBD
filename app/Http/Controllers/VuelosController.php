<?php

namespace App\Http\Controllers;

use App\Vuelo;
use App\Paquete;
use Illuminate\Http\Request;
use App\Http\Requests\VuelosRequest;

class VuelosController extends Controller
{

    public function index()
    {
        $vuelos = Vuelo::all()->where('origen_vuelo', '=' , request("ciudad_origen"))
                              ->where('destino_vuelo', '=' , request("ciudad_destino"))
                              ->where('fecha_viaje', '=' , request("fecha_vuelo"));

                            
        return view('vuelos',compact('vuelos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $vuelo = Vuelo::create($request->all());
        $vuelo->save();
        
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
