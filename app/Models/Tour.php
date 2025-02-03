<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table="Tours";
    protected $primaryKey="id_tour"; //solo se pone cuando la clave primaria no se llama id.
    //public $incrementing=false; //solo se pone cuando la clave primaria no es autoincremental.
    //protected $keyType="string"; //solo se pone cuando la clave primaria no es entero.
    public $timestamps=false;

    public function reservas()
    {
        return $this->hasMany(Reserva::class,"id_tour");
    }

    public function depositos()
    {
        return $this->belongsTo(Deposito::class,"id_deposito");
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class,"id_guia");
    }

    public function rutas()
    {
        return $this->belongsTo(Ruta::class,"id_rutas");
    }
}