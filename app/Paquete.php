<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
	protected $table = 'paquetes';
    protected $fillable = [
        'num_dias', 'num_noches', 'precio_paquete', 'destino_paquete', 'tipo_paquete', 'fecha_paquete', 'id_vuelo_ida', 'id_vuelo_vuelta', 'id_hospedaje', 'id_habitacion', 'id_transporte'
    ];

    public function reservas(){
        return $this ->hasMany(Reserva::class);
    }
}
