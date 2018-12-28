<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero_Reserva extends Model
{
    protected $table = 'pasajeros_reservas';
    protected $fillable = [
    	'id_pasajero', 'id_reserva',
    ];

	public function pasajero(){
        return $this ->belongsTo(Pasajero::class, 'id_pasajero');
    }

    public function reserva(){
        return $this ->belongsTo(Reserva::class, 'id_reserva');
    }

}