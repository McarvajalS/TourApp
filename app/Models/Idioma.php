<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;
    protected $table = "idiomas";
    protected $primaryKey = "id_idioma";
    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function rutaHorarioIdiomas()
    {
        return $this->hasMany(RutaHorarioIdioma::class, 'id_idioma');
    }
}
