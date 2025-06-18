<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetaController;


Route::get('/', [HomeController::class, 'index'])->name('home');
// dummy map
Route::get('/peta-potensi', [PetaController::class, 'index'])->name('peta.index');

Route::get('/peta-potensi/{kecamatan:slug}', [PetaController::class, 'show'])->name('peta.show');



