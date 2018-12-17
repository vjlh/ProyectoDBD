<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
	protected $table = 'vuelos';
    protected $fillable = [
        'hora_vuelo', 'duracion_vuelo', 'fecha_vuelo', 'origen_vuelo', 'destino_vuelo', 'id_avion', 'id_aeropuerto',
    ];

    public function aviones(){
        return $this ->belongsTo(Avion::class, 'id_avion');
    }

    public function aeropuertos(){
        return $this ->belongsTo(Aeropuerto::class, 'id_aeropuerto');
    }
    
}
