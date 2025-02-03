<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table="Usuarios";
    protected $primaryKey="id_usuario"; //solo se pone cuando la clave primaria no se llama id.
    //public $incrementing=false; //solo se pone cuando la clave primaria no es autoincremental.
    //protected $keyType="string"; //solo se pone cuando la clave primaria no es entero.
    public $timestamps=false;

    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class,"id_guia");
    }

    public function tours()
    {
        return $this->hasMany(Tour::class,"id_guia");
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class,"id_turista");
    }

    public function roles()
    {
        return $this->belongsTo(Rol::class,"id_rol");
    }
}