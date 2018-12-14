<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $fillable = [
        'nombre_promocion', 'descuento_promocion',
    ];

    public function reservas(){
        return $this ->hasMany(Reserva::class);
    }
    

}
