<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservasRequest extends FormRequest
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
            'monto_total_reserva' => 'required|integer', 
            'check_in' => 'required|boolean', 
            'id_user' => 'required|numeric', 
            'id_paquete' => 'required|numeric', 
            'id_seguro' => 'required|numeric', 
            'id_promocion' => 'required|numeric'
        ];
    }
}
