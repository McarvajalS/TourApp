<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;

Route::resource("usuarios", UsuarioController::class);
Route::resource('rutas', RutaController::class);
Route::resource('horario', HorarioController::class);
Route::resource('idioma', IdiomaController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('tours', TourController::class);

Route::get('/', function () {
    return view('reservas');
});

Route::get('/usuarios', function () {
    return view('usuarios');
});

Route::get('/tours', [TourController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});
