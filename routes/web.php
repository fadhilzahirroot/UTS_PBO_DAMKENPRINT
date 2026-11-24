<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return redirect()->route('karyawan.index');
});

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{kode}', [KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/{kode}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{kode}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{kode}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');