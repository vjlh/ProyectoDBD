<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
	protected $table = 'asientos';
    protected $fillable = [
        'numero_asiento', 'letra_asiento', 'precio_asiento', 'disponibilidad','cabina', 'id_avion', 'id_reserva',
    ];

    public function aviones(){
        return $this ->belongsTo(Avion::class, 'id_avion');
    }

    public function reservas(){
        return $this ->belongTo(Reserva::class, 'id_reserva');
    }
}
