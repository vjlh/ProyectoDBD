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
    
}
