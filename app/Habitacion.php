<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable = [
        'capacidad_habitacion', 'banio_privado', 'aire_acondicionado_habitacion', 'disponibilidad',
        'tipo', 'fecha_inicio', 'fecha_fin',
    ];

    public function hospedajes(){
        return $this ->belongsTo('App\Hospedaje');
    }

    public function habitaciones_reservas(){
        return $this ->belongsTo('App\Habitacion_Reserva');
    }

}
