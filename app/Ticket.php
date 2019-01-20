<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $table = 'tickets';
    protected $fillable = [
        'tipo_pago', 'monto_pago','fecha_pago', 'id_reserva'
    ];

    public function reservas(){
        return $this ->belongsTo(Reserva::class, 'id_reserva');
    }
}
