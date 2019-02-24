<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaquetesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'num_dias' => 'required|integer', 
            'num_noches' => 'required|integer', 
            'precio_paquete' => 'required|integer', 
            'destino_paquete' => 'required|string',
            'tipo_paquete' => 'required|string',
            'fecha_paquete' => 'required|date',
            'id_vuelo_ida' => 'required|numeric',
            'id_vuelo_vuelta' => 'required|numeric',
            'id_hospedaje' => 'required|numeric',
            'id_habitacion' => 'required|numeric',
            'id_transporte' => 'required|numeric',
        ];
    }
}
