<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportesRequest extends FormRequest
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
            'patente_transporte' => 'required|numeric', 
            'modelo_transporte' => 'required|string', 
            'num_asientos_transporte' => 'required|integer', 
            'num_puertas_transporte' => 'required|integer',
            'aire_acondicionado_transporte' => 'required|boolean', 
            'puntuacion_transporte' => 'required|integer|min:1|max:6', 
            'fecha_inicio' => 'required|date', 
            'fecha_fin' => 'required|date',
        ];
    }
}
