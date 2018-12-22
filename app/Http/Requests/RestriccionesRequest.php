<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestriccionesRequest extends FormRequest
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
            'nombre_restriccion' => 'required|string', 
            'descripcion_restriccion' => 'required|string',  
            'sancion_restriccion' => 'required|string', 
            'id_ciudad' => 'required|numeric'
        ];
    }
}
