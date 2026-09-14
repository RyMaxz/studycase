<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;

Route::get('/', [ProdukController::class, 'index'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

require __DIR__.'/settings.php';
