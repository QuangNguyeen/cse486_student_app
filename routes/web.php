<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use \App\Http\Controllers\ThongKeController;
use \App\Http\Controllers\KetQuaController;
use \App\Http\Controllers\LopController;
Route::get('/', [SinhVienController::class, 'index'])->name('index');
Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index');
Route::get('/thongke/ketquas', [KetQuaController::class, 'index'])->name('thongke.ketquas.index');
Route::get('/thongke/ketquas/create', [KetQuaController::class, 'create'])->name('thongke.ketquas.create');
Route::post('/thongke/ketquas', [KetQuaController::class, 'store'])->name('thongke.ketquas.store');
Route::get('/thongke/lop/{malop}/sinhvien', [LopController::class, 'danhSachSinhVien'])->name('lop.sinhvien');
Route::get('/thongke/lop/{malop}/sinhvien/{id}', [KetQuaController::class, 'danhSachKetQua'])->name('thongke.ketquas');
Route::get('/thongke/lop/{malop}/sinhvien/{id}/create', [KetQuaController::class, 'create'])->name('thongke.ketquas.create');







