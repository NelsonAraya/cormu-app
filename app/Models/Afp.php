<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afp extends Model
{
    public function usuarios(){
        return $this->hasMany(Usuario::class,'afp_id','id');
    }
}
