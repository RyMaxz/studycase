<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/{nip}', [KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/laporan/gaji', [KaryawanController::class, 'laporanGaji'])->name('karyawan.gaji');

Route::redirect('/', '/karyawan');

require __DIR__.'/settings.php';
