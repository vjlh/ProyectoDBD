<?php

namespace App\Http\Controllers;

use App\Vuelo;
use App\Avion;
use App\Paquete;
use Illuminate\Http\Request;
use App\Http\Requests\VuelosRequest;
use App\Historial;

class VuelosController extends Controller
{

    public function index()
    {
        $origen = request("ciudad_origen");
        $destino = request("ciudad_destino");
        $fecha_ida = request("fecha_viaje_ida");
        $fecha_vuelta = request("fecha_viaje_vuelta");
        $num_pasajeros = request("num_pasajeros");
        $tipo_vuelo = request("tipoVuelo");
        $fecha_limite = date('Y-m-d',strtotime($fecha_ida.' + 2 days'));
        $vuelosIda = Vuelo::all()->where('origen_vuelo', '=' , $origen)
                                 ->where('destino_vuelo', '=' , $destino)
                                 ->where('fecha_vuelo', '>=' , $fecha_ida)
                                 ->where('fecha_vuelo', '<', $fecha_limite)
                                 ->where('cantidad_disponible', '>=', $num_pasajeros);
        $vuelosIdaAux = [];
        foreach($vuelosIda as $vuelo){
            array_push($vuelosIdaAux,$vuelo->id);
        }
        if(empty($vuelosIdaAux)){
            return \Redirect::back()->with('statusVuelos','No hay vuelos disponibles.');
        }
        if($tipo_vuelo == "ida_y_vuelta"){
            $fecha_limite = date('Y-m-d',strtotime($fecha_vuelta.' + 2 days'));
            $vuelosVuelta = Vuelo::all()->where('origen_vuelo', '=' , $destino)
                                 ->where('destino_vuelo', '=' , $origen)
                                 ->where('fecha_vuelo', '>=' , $fecha_vuelta)
                                 ->where('fecha_vuelo', '<', $fecha_limite)
                                 ->where('cantidad_disponible', '>=', $num_pasajeros);
            $vuelosVueltaAux = [];
            foreach($vuelosVuelta as $vuelo){
                array_push($vuelosVueltaAux,$vuelo->id);
            }
            if(empty($vuelosVueltaAux)){
                return \Redirect::back()->with('statusVuelos','No hay vuelos disponibles.');
            }
        }
        return view('vuelos',compact('vuelosIda', 'num_pasajeros', 'tipo_vuelo','fecha_vuelta','origen','destino'));

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

        $historial = new Historial;
        $historial->id_user=auth()->id();
        $historial->descripcion="Ha creado el vuelo Nº" .$vuelo->id;
        $historial->save();
        
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

        $historial = new Historial;
        $historial->id_user=auth()->id();
        $historial->descripcion="Ha editado el vuelo Nº" .$vuelo->id;
        $historial->save();

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
            $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha eliminado el vuelo Nº" .$vuelo->id;
            $historial->save();

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
