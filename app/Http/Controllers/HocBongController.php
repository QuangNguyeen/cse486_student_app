<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Thêm dòng này ở đầu file

class HocBongController extends Controller
{
    public function index()
    {
        $dsKiHoc = DB::table('KETQUA')
            ->select('KIHOC')
            ->distinct()
            ->get();
        return view('hocbongs.index', compact('dsKiHoc')); // Trả về view index
    }

    public function getThongKe(Request $request)
    {
        $masv = $request->input('masv'); // Lấy mã sinh viên từ yêu cầu
        $kyHoc = $request->input('kyHoc'); // Lấy kỳ học từ yêu cầu

        // Gọi stored procedure sp_ThongKeSinhVienHocBong
        $sinhViens = DB::select('EXEC sp_ThongKeSinhVienHocBong ?, ?', [$masv, $kyHoc]);
        return response()->json($sinhViens); // Trả về dữ liệu dưới dạng JSON
    }
    public function thongKeHocBong(Request $request)
    {
        $dsKiHoc = DB::table('KETQUA')
            ->select('KIHOC')
            ->distinct()
            ->get();
        $kiHoc = $request->input('kihoc');
        $dsHocBong = DB::select('EXEC proc_THONGKEHOCBONG ?', [$kiHoc]);
        return view('hocbongs.index', compact('dsHocBong', 'dsKiHoc'));
    }

    public function getThongKeAll(Request $request)
    {
        $kyhoc = $request->input('kyHoc');

        try {
            $results = DB::select('EXEC sp_ThongKeHocBong_DungConTro ?', [$kyhoc]);
            return response()->json($results);
        } catch (\Exception $e) {
            //
            Log::error('Error when executing procedure: '.$e->getMessage());
            return response()->json(['error' => 'Có lỗi trong quá trình thực thi: ' . $e->getMessage()], 500);

        }
    }




}
