<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $fillable = [
        'patente_transporte', 'modelo_transporte', 'num_asientos_transporte', 'num_puertas_transporte',
        'aire_acondicionado_transporte', 'puntuacion_transporte', 'fecha_inicio', 'fecha_fin',
    ];

    public function transportes_reservas(){
        return $this ->belongsTo('App\Transporte_Reserva');
    }
}
