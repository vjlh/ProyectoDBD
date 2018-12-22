<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsientosRequest extends FormRequest
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
        return[
            'id_reserva' => 'required|numeric',
            'id_avion' => 'required|numeric',    
            'numero_asiento' => 'required|numeric|max:300|min:1',
            'letra_asiento' => 'required|string|size:1',
            'precio_asiento' => 'required|integer',
            'disponibilidad' => 'required|boolean',
            'cabina' => 'required|in:Economica,Salon-Cama,Premium,VIP'
        ];
    }
}
