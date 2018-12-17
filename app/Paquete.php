<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
	protected $table = 'paquetes';
    protected $fillable = [
        'num_dias', 'num_noches', 'precio_paquete', 'destino_paquete',
    ];

    public function reservas(){
        return $this ->hasMany(Reserva::class);
    }
}
