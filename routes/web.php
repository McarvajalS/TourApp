<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;

Route::resource("usuarios",UsuarioController::class);

Route::get('/', function () {
    return view('index');
});


Route::get('/reservas', function () {
    return view('reservas');
});

Route::get('/usuarios', function () {
    return view('usuarios');
});



Route::get('/login', function () {
    return view('login');
});
