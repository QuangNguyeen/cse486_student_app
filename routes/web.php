<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;


Route::get('/', [SinhVienController::class, 'index'])->name('sinhviens.index');

Route::delete('/sinhvien/{id}', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');

Route::get('/sinhvien/{id}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
Route::put('/sinhvien/{id}', [SinhVienController::class, 'update'])->name('sinhviens.update');


Route::get('/sinhvien/{id}', [SinhVienController::class, 'show'])->name('sinhviens.show');
