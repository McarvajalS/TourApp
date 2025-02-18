<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = "horarios";
    protected $primaryKey = "id_horario";
    public $timestamps = false;

    protected $fillable = ['hora_inicio', 'hora_fin'];

    public function rutaHorarioIdiomas()
    {
        return $this->hasMany(RutaHorarioIdioma::class, 'id_horario');
    }
}
