<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
	protected $table = 'historiales';
    protected $fillable = [
        'descripcion', 'id_user',
    ];

    public function users(){
        return $this ->belongsTo(User::clases, 'id_user');
    }
}
