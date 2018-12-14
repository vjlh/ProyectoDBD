<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $fillable = [
        'hora_vuelo', 'duracion_vuelo', 'fecha_vuelo', 'origen_vuelo', 'destino_vuelo',
    ];

    public function aviones(){
        return $this ->belongsTo('App\Avion');
    }

    public function aeropuertos(){
        return $this ->belongsTo('App\Aeropuerto');
    }
    
}
