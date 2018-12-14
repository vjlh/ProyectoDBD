<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    protected $fillable = [
        'capacidad_avion', 'salidas_emergencia', 'sanitarios_avion', 'longitud_avion', 'envergadura_avion',
    ];

    public function asientos(){
        return $this ->hasMany('App\Asiento');
    }

    public function vuelos(){
        return $this ->hasMany('App\Vuelo');
    }

}
