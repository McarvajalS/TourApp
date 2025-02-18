<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'Tours';
    protected $primaryKey = 'id_tour';
    public $timestamps = false; // Si no usas created_at y updated_at

    protected $fillable = [
        'fecha_tour',
        'id_ruta_horario_idioma', // Nuevo campo
        'id_guia',
        'estado',
        'comision_tour', // Nuevo campo
        'fecha_rendicion',
        'id_deposito'
    ];

    // Relación con la tabla `ruta_horario_idioma`
    public function rutaHorarioIdioma()
    {
        return $this->belongsTo(RutaHorarioIdioma::class, 'id_ruta_horario_idioma', 'id_ruta_horario_idioma');
    }

    // Relación con `reservas` (un tour tiene muchas reservas)
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_tour', 'id_tour');
    }

    // Relación con `usuarios` (un tour tiene un guía asignado)
    public function guia()
    {
        return $this->belongsTo(User::class, 'id_guia', 'id');
    }

    // Relación con `depositos` (un tour puede estar vinculado a un depósito)
    public function deposito()
    {
        return $this->belongsTo(Deposito::class, 'id_deposito', 'id_deposito');
    }

    public function totalPax()
    {
        return $this->reservas()->sum('cantidad_personas');
    }

}


// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Tour extends Model
// {
//     use HasFactory;
//     protected $table="Tours";
//     protected $primaryKey="id_tour"; //solo se pone cuando la clave primaria no se llama id.
//     //public $incrementing=false; //solo se pone cuando la clave primaria no es autoincremental.
//     //protected $keyType="string"; //solo se pone cuando la clave primaria no es entero.
//     public $timestamps=false;

//     public function reservas()
//     {
//         return $this->hasMany(Reserva::class,"id_tour");
//     }

//     public function depositos()
//     {
//         return $this->belongsTo(Deposito::class,"id_deposito");
//     }

//     public function usuarios()
//     {
//         return $this->belongsTo(Usuario::class,"id_guia");
//     }

//     public function rutas()
//     {
//         return $this->belongsTo(Ruta::class,"id_rutas");
//     }


    
// }