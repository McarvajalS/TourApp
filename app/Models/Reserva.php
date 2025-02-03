<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table="Reservas";
    protected $primaryKey="id_reserva"; //solo se pone cuando la clave primaria no se llama id.
    //public $incrementing=false; //solo se pone cuando la clave primaria no es autoincremental.
    //protected $keyType="string"; //solo se pone cuando la clave primaria no es entero.
    public $timestamps=false;

    public function tours()
    {
        return $this->belongsTo(Tour::class,"id_tour");
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class,"id_turista");
    }

    public function rutas()
    {
        return $this->belongsTo(Ruta::class,"id_rutas");
    }
}
