<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte_Reserva extends Model
{
    protected $table = 'transportes_reservas';
    protected $fillable = [
    	'id_transporte', 'id_reserva', 'fecha_inicio', 'fecha_fin',
    ];

    public function transporte(){
        return $this ->belongsTo(Transporte::class, 'id_transporte');
    }

    public function reserva(){
        return $this ->belongsTo(Reserva::class, 'id_reserva');
    }
}
