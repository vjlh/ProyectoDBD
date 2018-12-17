<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
	protected $table = 'pasajeros';
    protected $fillable = [
        'nombre_pasajero', 'apellido_pasajero', 'edad_pasajero', 'tipo_pasajero',
    ];

    public function reservas(){
        return $this ->belongsToMany(Reserva::class, 'pasajeros_reservas', 'id_pasajero', 'id_reserva');
    }

    public function equipajes(){
        return $this ->hasMany(Equipaje::class);
    }
}
