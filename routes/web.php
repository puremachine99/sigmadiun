<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// dummy map
Route::get('/peta-potensi', [\App\Http\Controllers\PetaController::class, 'index'])->name('peta.index');

Route::get('/peta-potensi/{kecamatan:slug}', [\App\Http\Controllers\PetaController::class, 'show'])->name('peta.show');
Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda.index');