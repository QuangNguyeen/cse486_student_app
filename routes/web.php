<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;


Route::get('/sinhvien', [SinhVienController::class, 'index']);