<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\HocPhiController;
use App\Http\Controllers\HocBongController;


Route::get('/', [SinhVienController::class, 'index'])->name('sinhviens.index');

Route::delete('/sinhvien/{id}', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');

Route::get('/sinhvien/{id}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
Route::put('/sinhvien/{id}', [SinhVienController::class, 'update'])->name('sinhviens.update');


Route::get('/sinhvien/{id}', [SinhVienController::class, 'show'])->name('sinhviens.show');


//học phí

// Hiển thị giao diện tra cứu học phí
Route::get('/hocphi', [HocPhiController::class, 'index'])->name('hocphi.index');

// Tính học phí
Route::get('/hocphi/tinh', [HocPhiController::class, 'tinhHocPhi'])->name('hocphi.tinh');

//học bổng
Route::get('/hocbong', [HocBongController::class, 'index']) ->name('hocbong.index');;
Route::get('/api/hocbong', [HocBongController::class, 'getThongKe']); 