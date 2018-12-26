<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AeropuertosRequest extends FormRequest
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
            'nombre_aeropuerto' => 'required|string',
            'direccion_aeropuerto' => 'required|string',
            'telefono_aeropuerto' => 'required|numeric',
            'pagina_web' => 'required|string',
            'id_ciudad' => 'required|numeric'
        ];
    }
}
