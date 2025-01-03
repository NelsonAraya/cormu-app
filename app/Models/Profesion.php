<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    public function usuarios(){
        return $this->hasMany(Usuario::class,'profesion_id','id');
    }
}
