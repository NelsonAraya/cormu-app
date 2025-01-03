<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civils';

    public function usuarios(){
        return $this->hasMany(Usuario::class,'e_civil_id','id');
    }
}
