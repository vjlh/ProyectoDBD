<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable = [
        'capacidad_habitacion', 'banio_privado', 'aire_acondicionado_habitacion', 'disponibilidad',
        'tipo', 'fecha_inicio', 'fecha_fin', 'id_hospedaje',
    ];

    public function hospedajes(){
        return $this ->belongsTo(Hospedaje::class, 'id_hospedaje');
    }

    public function reservas(){
        return $this ->belongsToMany(Reserva::class, 'habitaciones_reservas', 'id_reserva', 'id_habitacion');
    }

}
