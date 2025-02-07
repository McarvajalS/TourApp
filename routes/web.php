<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::resource("usuarios",UsuarioController::class);

Route::get('/', function () {
    return view('index');
});

Route::get('/reservas', function () {
    return view('reservas');
});

Route::get('/rutas', function () {
    return view('rutas');
});

Route::get('/tours', function () {
    return view('tours');
});
