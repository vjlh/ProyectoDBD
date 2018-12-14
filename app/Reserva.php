<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{

    protected $fillable = [
        'monto_total_reserva', 'check_in',
    ];

    
    public function promociones()
    {
        return $this->belongsTo('App\Promocion');
    }
    public function paquetes()
    {
        return $this->belongsTo('App\Paquete');
    }
    public function seguros()
    {
        return $this->belongsTo('App\Seguro');
    }

    public function pasajeros_reservas()
    {
        return $this->belongsTo('App\Pasajero_Reserva');
    }

    public function asientos()
    {
        return $this->belongsTo('App\Asiento');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function transportes_reservas()
    {
        return $this->belongsTo('App\Transporte_Reserva');
    }

    public function habitaciones_reservas()
    {
        return $this->belongsTo('App\Habitacion_Reserva');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    
}
