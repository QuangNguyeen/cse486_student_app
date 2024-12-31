<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HocPhiController extends Controller
{
    public function index()
    {
        return view('hocphis.index');
    }

    public function tinhHocPhi(Request $request)
    {
        $maSV = $request->query('maSV');
        $kyHoc = $request->query('kyHoc');

        // Gọi hàm SQL
        $hocPhi = DB::select("SELECT dbo.TinhHocPhi(:maSV, :kyHoc) AS HocPhi", [
            'maSV' => $maSV,
            'kyHoc' => $kyHoc,
        ]);

        return response()->json([
            'maSV' => $maSV,
            'kyHoc' => $kyHoc,
            'hocPhi' => $hocPhi[0]->HocPhi ?? 0,
        ]);
    }
}
