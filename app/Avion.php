<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    protected $fillable = [
        'capacidad_avion', 'salidas_emergencia', 'sanitarios_avion', 'longitud_avion', 'envergadura_avion',
        'id_vuelo'
    ];

    public function asientos(){
        return $this ->hasMany(Asiento::class);
    }

    public function vuelos(){
        return $this ->hasMany(Vuelo::class);
    }

}
