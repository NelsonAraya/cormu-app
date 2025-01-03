<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prevision extends Model
{
    public function usuarios(){
        return $this->hasMany(Usuario::class,'prevision_id','id');
    }
}
