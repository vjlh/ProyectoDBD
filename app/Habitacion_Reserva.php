<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion_Reserva extends Model
{
    protected $table = 'habitaciones_reservas';
    protected $fillable = [
    	'id_habitacion', 'id_reserva', 'fecha_inicio', 'fecha_fin'
    ];
	

	public function habitacion(){
	        return $this ->belongsTo(Habitacion::class, 'id_habitacion');
	    }

	public function reserva(){
	        return $this ->belongsTo(Reserva::class, 'id_reserva');
    	}
}