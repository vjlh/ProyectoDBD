<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipajesRequest extends FormRequest
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
            'ancho' => 'required|integer', 
            'alto' => 'required|integer', 
            'largo' => 'required|integer', 
            'tipo_equipaje' => 'required|in:Maleta,Bolso,Mochila,Cartera,Maletin', 
            'restricciones_equipaje' => 'required|string',
            'id_pasajero' => 'required|numeric'
        ];
    }
}
