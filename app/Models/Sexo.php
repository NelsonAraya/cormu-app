<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    public function usuarios(){
        return $this->hasMany(Usuario::class,'sexo_id','id');
    }
}
