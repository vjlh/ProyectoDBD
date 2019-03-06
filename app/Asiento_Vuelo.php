<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento_Vuelo extends Model
{
    protected $table = 'asientos_vuelos';
    protected $fillable = [
    	'id_vuelo', 'id_asiento', 'id_reserva', 'disponible','codigo_checkin','check_in'
    ];

    public function vuelo(){
        return $this ->belongsTo(Vuelo::class, 'id_vuelo');
    }

    public function asiento(){
        return $this ->belongsTo(Asiento::class, 'id_asiento');
    }

    public function reserva(){
        return $this ->belongsTo(Reserva::class, 'id_reserva');
    }
}
