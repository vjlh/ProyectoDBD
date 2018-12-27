<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
	protected $table = 'promociones';
    protected $fillable = [
        'nombre_promocion', 'descuento_promocion','descripcion_promocion'
    ];

    public function reservas(){
        return $this ->hasMany(Reserva::class);
    }
    

}
