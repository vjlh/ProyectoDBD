<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = [
        'monto_total_reserva', 'check_in', 'id_user', 'id_paquete', 'id_seguro', 'id_promocion', 'transporte','reserva','vuelo'
    ];
    
    public function promociones()
    {
        return $this->belongsTo(Promocion::class, 'id_promocion');
    }
    public function paquetes()
    {
        return $this->belongsTo(Paquete::class, 'id_paquete');
    }
    public function seguros()
    {
        return $this->belongsTo(Seguro::class, 'id_seguro');
    }

    public function pasajeros()
    {
        return $this->belongsToMany(Pasajero::class, 'pasajeros_reservas', 'id_pasajero', 'id_reserva');
    }

    public function asientos()
    {
        return $this->hasMany(Asiento::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function transportes()
    {
        return $this->belongsToMany(Transporte::class, 'transportes_reservas', 'id_transporte', 'id_reserva');
    }

    public function habitaciones()
    {
        return $this->belongsToMany(Habitacion::class. 'habitaciones_reservas', 'id_habitacion', 'id_reserva');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    
}
