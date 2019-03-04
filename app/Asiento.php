<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
	protected $table = 'asientos';
    protected $fillable = [
        'numero_asiento', 'letra_asiento', 'precio_asiento', 'cabina', 'id_avion',
    ];

    public function aviones(){
        return $this ->belongsTo(Avion::class, 'id_avion');
    }

}
