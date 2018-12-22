<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacionesRequest extends FormRequest
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
            'capacidad_habitacion' => 'required|integer|min:1|max:6', 
            'banio_privado' => 'required|boolean', 
            'aire_acondicionado_habitacion' => 'required|boolean', 
            'disponibilidad' => 'required|boolean',
            'tipo' => 'required|string', 
            'fecha_inicio' => 'required|date', 
            'fecha_fin' => 'required|date', 
            'id_hospedaje' => 'required|numeric'
        ];
    }
}
