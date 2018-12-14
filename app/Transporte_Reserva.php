<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte_Reserva extends Model
{
    public function transportes()
    {
        return $this->hasMany('App\Transporte');
    }

    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }
}
