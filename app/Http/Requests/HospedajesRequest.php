<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospedajesRequest extends FormRequest
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
            'nombre_hospedaje' => 'required|string', 
            'cadena_hospedaje' => 'required|string',
            'cantidad_disponible' => 'required|integer', 
            'estrellas_hospedaje' => 'required|integer|min:1|max:6', 
            'estacionamiento_hospedaje' => 'required|boolean',
            'piscina_hospedaje' => 'required|boolean', 
            'sauna_hospedaje' => 'required|boolean', 
            'zona_infantil_hospedaje' => 'required|boolean', 
            'gimnasio_hospedaje' => 'required|boolean'
        ];
    }
}
