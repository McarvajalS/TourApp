<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('index');
});

Route::resource("usuarios",UsuarioController::class);

Route::post("editContrasenia",[UsuarioController::class,"editContrasenia"]);

Route::post("updateContrasenia",[UsuarioController::class,"updateContrasenia"]);

Route::get('/reservas', function () {
    return view('reservas');
});

Route::get('/rutas', function () {
    return view('rutas');
});

Route::get('/tours', function () {
    return view('tours');
});
