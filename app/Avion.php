<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    protected $table = 'aviones';
    protected $fillable = [
        'capacidad_avion', 'salidas_emergencia', 'sanitarios_avion', 'longitud_avion', 'envergadura_avion', 'cantidad_disponible',
    ];

    public function asientos(){
        return $this ->hasMany(Asiento::class);
    }

    public function vuelos(){
        return $this ->hasMany(Vuelo::class);
    }

}
