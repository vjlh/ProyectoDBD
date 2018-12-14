<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'tipo_pago', 'monto_pago', 'fecha_pago',
    ];

    public function reservas(){
        return $this ->belongsTo('App\Reserva');
    }
}
