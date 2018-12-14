<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion_Reserva extends Model
{
    public function habitaciones()
    {
        return $this->hasMany('App\Habitacion');
    }

    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }
}
