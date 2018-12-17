<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
	protected $table = 'administradores';
    protected $fillable = [
        'id_user',
    ];

    public function users(){
        return $this ->belongsTo(User::class, 'id_user');
    }
}
