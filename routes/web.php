<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\HocPhiController;
use App\Http\Controllers\HocBongController;

use App\Http\Controllers\KyluatController;


//dashboard

//thông tin sinh viên 
Route::get('/sinhvien', [SinhVienController::class, 'index'])->name('sinhviens.index');

Route::delete('/sinhvien/{id}', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');

Route::get('/sinhvien/{id}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
Route::put('/sinhvien/{id}', [SinhVienController::class, 'update'])->name('sinhviens.update');


Route::get('/sinhvien/{id}', [SinhVienController::class, 'show'])->name('sinhviens.show');
//cap nhat trang thai sinh vien
Route::get('/api/sinhvien', [SinhVienController::class, 'updateStatus'])->name('sinhvien.trangthai');


//học phí

// Hiển thị giao diện tra cứu học phí
Route::get('/hocphi', [HocPhiController::class, 'index'])->name('hocphi.index');

// Tính học phí
Route::get('/hocphi/tinh', [HocPhiController::class, 'tinhHocPhi'])->name('hocphi.tinh');

//học bổng
Route::get('/hocbong', [HocBongController::class, 'index']) ->name('hocbong.index');;
Route::get('/api/hocbong', [HocBongController::class, 'getThongKe']); 
//thong ke hoc bong theo ky hoc

Route::get('/statistical', function () {
    return view('/hocbongs.statistical');
})->name('statistical.index');
Route::get('/api/statistical', [HocBongController::class, 'getThongKeAll'])->name('hocbong.statistical');





//homepage
Route::get('/', function () {
    return view('/homepages.index');
})->name('homepage');

//kyluat 





Route::get('/kyluat', [KyluatController::class, 'index'])->name('kyluat.index');
