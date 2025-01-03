<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoUsuario extends Model
{
    protected $table = 'estado_usuario';

    public function usuarios(){
        return $this->hasMany(Usuario::class,'estado_id','id');
    }
}
