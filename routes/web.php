<?php

use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ProfilDaerahController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil-daerah', [ProfilDaerahController::class, 'index'])->name('profil.index');
// dummy map
Route::prefix('peta-potensi')->name('peta.')->group(function () {
    Route::get('/', [PetaController::class, 'index'])->name('index');
    Route::get('/{kecamatan:slug}', [PetaController::class, 'show'])->name('show');
});

// halaman potensi
Route::prefix('potensi')->name('potensi.')->group(function () {
    Route::get('/', [PotensiController::class, 'index'])->name('index');
    Route::get('/{potensi}', [PotensiController::class, 'show'])->name('show');
}); 

// halamman umkm
Route::prefix('umkm')->name('umkm.')->group(function () {
    Route::get('/', [UmkmController::class, 'index'])->name('index');
    Route::get('/{umkm}', [UmkmController::class, 'show'])->name('show');
});




