<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index')->middleware('auth');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

    Route::get('/produk/cetak-pdf', [ProdukController::class, 'cetakPdf']);
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
;
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

