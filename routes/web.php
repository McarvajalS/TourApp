<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('usuarios');
});


Route::get('/reservas', function () {
    return view('reservas');
});

Route::get('/usuarios', function () {
    return view('usuarios');
});

Route::get('/rutas', function () {
    return view('rutas');
});

Route::get('/tours', function () {
    return view('tours');
});
