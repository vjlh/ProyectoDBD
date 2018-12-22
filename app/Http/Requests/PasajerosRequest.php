<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasajerosRequest extends FormRequest
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
            'nombre_pasajero' => 'required|string', 
            'apellido_pasajero' => 'required|string', 
            'edad_pasajero' => 'required|integer|min:1|max:100', 
            'tipo_pasajero' => 'required|in:bebe,joven,adulto,adulto_mayor'
        ];
    }
}
