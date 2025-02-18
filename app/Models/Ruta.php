<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table="Rutas";
    protected $primaryKey="id_rutas"; //solo se pone cuando la clave primaria no se llama id.
    //public $incrementing=false; //solo se pone cuando la clave primaria no es autoincremental.
    //protected $keyType="string"; //solo se pone cuando la clave primaria no es entero.
    public $timestamps=false;

    protected $fillable = [
        'nombre',
        'imagen',
        'duracion',
        'estado',
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class,"id_rutas");
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class,"id_rutas");
    }

    public function rutaHorarioIdiomas()
    {
        return $this->hasMany(RutaHorarioIdioma::class, 'id_rutas');
    }
}