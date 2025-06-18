<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\ProfilDaerahController;


Route::get('/', [HomeController::class, 'index'])->name('home');
// dummy map
Route::prefix('peta-potensi')->name('peta.')->group(function () {
    Route::get('/', [PetaController::class, 'index'])->name('index');
    Route::get('/{kecamatan:slug}', [PetaController::class, 'show'])->name('show');
});

Route::get('profil-daerah', [ProfilDaerahController::class, 'index'])->name('profil');

