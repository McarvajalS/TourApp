<?php

namespace App\Http\Helpers;

if (!function_exists('mostrarMensaje')) {
    function mostrarMensaje($tipo, $titulo, $mensaje)
    {
        session()->flash('mensaje', [
            'tipo' => $tipo,
            'titulo' => $titulo,
            'mensaje' => $mensaje,
        ]);
    }
}