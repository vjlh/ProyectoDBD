<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use App\Transporte;
use App\Transporte_Reserva;
use App\Paquete;
use App\Ciudad;
use App\Vuelo;
use Illuminate\Http\Request;
use App\Http\Requests\TransportesRequest;
use Carbon\Carbon;
use App\Historial;


class TransportesController extends Controller
{

    public function index()
    {

        $ciudad = request('ciudad_inicio');
        $fecha_inicio = Carbon::parse(request('fecha_inicio'));
        $fecha_fin = Carbon::parse(request('fecha_fin'));

        $diasDiferencia = $fecha_fin->diffInDays($fecha_inicio);

        $transportes = Transporte::All()->where('ubicacion', '=', $ciudad);
        $transportesUbicacion = [];
        
        foreach($transportes as $transporte){
            array_push($transportesUbicacion, $transporte->id);
        }
        if(!empty($transportesUbicacion)){
            $num_asientos= request('num_asientos_transporte');

            $transportes_r = Transporte_reserva::all()->whereIn('id_transporte',$transportesUbicacion);
        
            foreach ($transportes_r as $test){
                if($fecha_fin > $test->fecha_inicio && $fecha_fin < $test->fecha_fin){
                    //sacar la id correspondiente
                    $clave = array_search($test->id_transporte, $transportesUbicacion);
                    unset($transportesUbicacion[$clave]);


                }
                if($fecha_inicio > $test->fecha_inicio && $fecha_inicio < $test->fecha_fin){
                    //sacar la id correspondiente
                    $clave = array_search($test->id_transporte, $transportesUbicacion);
                    unset($transportesUbicacion[$clave]);
                }
            }

            $transportes = Transporte::all()->whereIn('id',$transportesUbicacion);
                                            
            session()->put('diasTransporte', $diasDiferencia);
            session()->put('fechaInicioTransporte', $fecha_inicio);
            session()->put('fechaFinTransporte', $fecha_fin);
            session()->put('ubicacionTransporte', $ciudad);
            session()->put('asientosTransporte', $num_asientos);

            $transportesAux = [];
            foreach($transportes as $transporte){
                array_push($transportesAux, $transporte->id);
            }
            if(!empty($transportesAux)){
                $paquete = NULL;
                return view('autos',compact('transportes','paquete'));
            }
            else{
                return \Redirect::back()->with('statusDisponibilidad','statusDisponibilidad');
            }
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
        $transporte = Transporte::create($request->all());
        $transporte->save();

        $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha creado el autómovil Nº" .$transporte->id;
            $historial->save();
        
        return back()->with('success_message','Agregado con éxito!');
 

    }

    public function show($id)
    {
        $transporte = Transporte::find($id);
        if($transporte!=NULL)
            return $transporte;
        else
            return "El transporte con el id ingresado no existe o fue eliminado"; 
    }

    public function edit(Transporte $transporte)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $transporte = Transporte::find($id);
        $outcome = $transporte->fill($this->validate($request, [
            'precio' => 'required',
            'patente_transporte' => 'required',
            'disponibilidad' => 'required',
            'modelo_transporte' => 'required',
            'num_asientos_transporte' => 'required',
            'num_puertas_transporte' => 'required',
            'aire_acondicionado_transporte' => 'required',
            'ubicacion' =>'required',
            // 'puntuacion_transporte' => 'required',
        ]))->save();

        $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha editado el automóvil Nº" .$transporte->id;
            $historial->save();

        if ($outcome) {
            //dd("aqui");
            return back()->with('success_message','Actualizado con éxito!');
        } else {
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');
            //dd("aqui2");
        }



        /*$transporte = Transporte::find($id);
        $transporte->fill($request->all());
        $transporte->save();
        return $transporte;*/
    }

    public function destroy($id)
    {
        $transporte = Transporte::find($id);

        $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha eliminado el automóvil Nº" .$transporte->id;
            $historial->save();

        if($transporte!=NULL)
        {
            $transporte->delete();
            Transporte::destroy($id);
            return back()->with('success_message','Se ha eliminado el automóvil con éxito!');
        }
        else
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');

    }

    public function obtenerAutosPaquete($id){
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
        $vuelo = $vuelos[$element];
        $fecha_inicio = $paquete->fecha_paquete;
        $fecha_fin = date('Y-m-d', strtotime($paquete->fecha_paquete. ' + ' .$paquete->num_dias. ' days'));

        $transportes_reservados1 =  DB::table('transportes_reservas')->where('fecha_fin','<',$fecha_inicio)->select('id_transporte')->get();                        
        $transportes_reservados2 =  DB::table('transportes_reservas')->where('fecha_inicio','>',$fecha_fin)->select('id_transporte')->get();                        
        
        $ids = [];
        $ids_NoDisponibles = [];

        foreach($transportes_reservados1 as $tr1){
            array_push($ids,$tr1->id_transporte);
        }
        foreach($transportes_reservados2 as $tr2){
            array_push($ids,$tr2->id_transporte);
        }

        $transportes_reservados3 = DB::table('transportes_reservas')->whereNotIn('id_transporte',$ids)->select('id_transporte')->get();
        foreach($transportes_reservados3 as $tr3){
            array_push($ids_NoDisponibles,$tr3->id_transporte);
        }

        $transportes = Transporte::all()->whereNotIn('id',$ids_NoDisponibles);
        return View('autos',['paquete' => $paquete, 'transportes' => $transportes, 'vuelo' => $vuelo, 'num_pasajeros' => $num_pasajeros]);
    }
}
