<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $fillable = [
        'num_asiento', 'letra_asiento', 'precio_asiento', 'disponibilidad','cabina',
    ];

    public function aviones(){
        return $this ->belongsTo('App\Avion');
    }

    public function reservas(){
        return $this ->belongTo('App\Reserva');
    }
}
