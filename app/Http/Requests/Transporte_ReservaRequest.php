<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Transporte_ReservaRequest extends FormRequest
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
            'id_transporte' => 'required|numeric',
            'id_reserva' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'
        ];
    }
}
