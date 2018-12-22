<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiosRequest extends FormRequest
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
            'nombre_beneficio' => 'required|string',
            'descripcion_beneficio' => 'required|string', 
            'precio_beneficio' => 'required|integer|min:10000|max:50000'
        ];
    }
}
