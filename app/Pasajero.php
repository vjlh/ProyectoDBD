<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $fillable = [
        'nombre_pasajero', 'apellido_pasajero', 'edad_pasajero', 'tipo_pasajero',
    ];

    public function pasajeros_reservas(){
        return $this ->belongsTo('App\Pasajero_Reserva');
    }

    public function equipajes(){
        return $this ->hasMany('App\Equipaje');
    }
}
