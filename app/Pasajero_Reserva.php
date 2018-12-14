<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero_Reserva extends Model
{
    public function pasajeros()
    {
        return $this->hasMany('App\Pasajero');
    }

    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }
}
