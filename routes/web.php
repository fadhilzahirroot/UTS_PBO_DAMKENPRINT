<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KaryawanController;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/', function () {
    return 'hallo dek';
});

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');

Route::get('/undangan/{jenis}', [ProdukController::class, 'byKategori'])->name('undangan.kategori');

// === TUGAS PBO - KARYAWAN ===
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{kode}', [KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/{kode}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{kode}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{kode}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');