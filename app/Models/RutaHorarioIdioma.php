<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutaHorarioIdioma extends Model
{
    use HasFactory;
    protected $table = "ruta_horario_idioma";
    protected $primaryKey = "id_ruta_horario_idioma";
    public $timestamps = false;

    protected $fillable = ['id_rutas', 'id_horario', 'id_idioma'];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_rutas');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }

    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'id_idioma');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_ruta_horario_idioma');
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'id_ruta_horario_idioma', 'id_ruta_horario_idioma');
    }

}
