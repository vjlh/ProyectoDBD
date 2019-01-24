<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
	protected $table = 'transportes';
    protected $fillable = [
        'patente_transporte', 'modelo_transporte', 'num_asientos_transporte', 'num_puertas_transporte',
        'aire_acondicionado_transporte', 'puntuacion_transporte', 'disponibilidad','precio'
    ];

    public function reservas(){
        return $this ->belongsToMany(Reserva::class, 'transportes_reservas', 'id_reserva', 'id_transporte');
    }
}
