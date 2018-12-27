<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegurosRequest extends FormRequest
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
            'precio_seguro' => 'required|integer', 
            'tipo_seguro' => 'required|string', 
            'precio_ticket' => 'required|integer', 
            'numero_pasajeros_seguros' => 'required|integer|min:1|max:20'
        ];
    }
}
