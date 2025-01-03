<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'dv',
        'nombres',
        'apellidop',
        'apellidom',
        'telefono',
        'direccion',
        'email',
        'fecha_nacimiento',
        'prevision_id',
        'afp_id',
        'sexo_id',
        'profesion_id',
        'e_civil_id',
        'estado_id'
    ];

    public function prevision(){
        return $this->belongsTo(Prevision::class,'prevision_id','id');
    }
    public function afp(){
        return $this->belongsTo(Afp::class,'afp_id','id');
    }
    public function sexo(){
        return $this->belongsTo(Sexo::class,'sexo_id','id');
    }
    public function profesion(){
        return $this->belongsTo(Profesion::class,'profesion_id','id');
    }
    public function ecivil(){
        return $this->belongsTo(EstadoCivil::class,'e_civil_id','id');
    }
    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id','id');
    }

    public function getNameAttribute(): string
    {
        return $this->nombres ?? 'Sin Nombre';
    }


}
