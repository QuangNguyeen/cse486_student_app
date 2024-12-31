<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HocBongController extends Controller
{
    public function index()
    {
        return view('hocbongs.index'); // Trả về view index
    }

    public function getThongKe(Request $request)
    {
        $masv = $request->input('masv'); // Lấy mã sinh viên từ yêu cầu
        $kyHoc = $request->input('kyHoc'); // Lấy kỳ học từ yêu cầu

        // Gọi stored procedure sp_ThongKeSinhVienHocBong
        $sinhViens = DB::select('EXEC sp_ThongKeSinhVienHocBong ?, ?', [$masv, $kyHoc]);

        return response()->json($sinhViens); // Trả về dữ liệu dưới dạng JSON
    }
}
