<?php

namespace App\Http\Controllers;

use App\Beneficio;
use Illuminate\Http\Request;
use App\Http\Requests\BeneficiosRequest;
use Carbon\Carbon;
use App\Historial;

class BeneficiosController extends Controller
{
    //Probado
    public function index()
    {      
        return Beneficio::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $beneficio = Beneficio::create($request->all());
        $beneficio->save();

        $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha creado el seguro Nº" .$beneficio->id;
            $historial->save();
        
        return back()->with('success_message','Agregado con éxito!');
 

    }

    public function show($id)
    {
        $beneficio = Beneficio::find($id);
        if($beneficio != NULL)
            return $beneficio;
        else
            return "No existe beneficio con la id ingresada";    
    }

    public function edit(Beneficio $beneficio)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $beneficio = Beneficio::find($id);
        $outcome = $beneficio->fill($this->validate($request, [
            'nombre_beneficio' => 'required',
            'descripcion_beneficio' => 'required',
            'precio_beneficio' => 'required',
        ]))->save();

        $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha editado el seguro Nº" .$beneficio->id;
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
        $beneficio = Beneficio::find($id);

        $historial = new Historial;
            $historial->id_user=auth()->id();
            $historial->descripcion="Ha eliminado el seguro Nº" .$beneficio->id;
            $historial->save();

        if ($beneficio != NULL)
        {
            $beneficio->delete();
            Beneficio::destroy($id);
            return "El beneficio se ha eliminado";
        }
        else
            return "El beneficio con el id ingresado no existe o ya fue eliminado";
        
    }
    public function mostrarSeguros()
    {
        $fecha_ida = Carbon::parse(request('fecha_ida'));
        $fecha_vuelta = Carbon::parse(request('fecha_vuelta'));
        $diasDiferencia = $fecha_vuelta->diffInDays($fecha_ida);

        $destino= request('destino');
        $numero_pasajeros= request('numero_pasajeros');

        session()->put('diasDuracion_seguro', $diasDiferencia);
        session()->put('fechaInicio_seguro', $fecha_ida);
        session()->put('fechaFin_seguro', $fecha_vuelta);
        session()->put('destino_seguro', $destino);
        session()->put('numeroPasajeros_seguro', $numero_pasajeros);

        $seguros =  Beneficio::all();
        return view('seleccion_seguros',compact('seguros'));

    }
}
