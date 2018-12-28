<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvionesRequest extends FormRequest
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
            'capacidad_avion' => 'required|integer', 
            'salidas_emergencia' => 'required|integer|max:20|min:1', 
            'sanitarios_avion' => 'required|integer|max:10|min:1', 
            'longitud_avion' => 'required|integer|max:500|min:1',
            'envergadura_avion' => 'required|in:Grande,Chico,Mediano'
            'cantidad_disponible' => 'required|integer',
            
        ];
    }
}
