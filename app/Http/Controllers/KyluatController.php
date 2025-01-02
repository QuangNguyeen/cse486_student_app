<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KyluatController extends Controller
{
    public function index()
    {
        // Truy xuất dữ liệu từ view vw_TrangThaiSinhVien
        $students = DB::table('vw_TrangThaiSinhVien')->get(); // Lấy toàn bộ dữ liệu từ view

        return view('kyluats.index', compact('students')); // Truyền dữ liệu vào view
    }
}
