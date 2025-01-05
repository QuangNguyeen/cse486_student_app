<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KyLuatController extends Controller
{
    public function index()
    {
//         Truy xuất dữ liệu từ view vw_TrangThaiSinhVien
        $dsSinhVien = DB::table('vw_TrangThaiSinhVien')->get(); // Lấy toàn bộ dữ liệu từ view

        return view('kyluats.index', compact('dsSinhVien')); // Truyền dữ liệu vào view
    }
}
