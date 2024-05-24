<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Import Auth facade

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TecnologiaController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tecnologias', TecnologiaController::class);
Route::resource('categorias', CategoriaController::class);
