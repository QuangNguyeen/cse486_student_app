<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SinhVien;
use App\Models\HocPhi;
use App\Models\Ketqua;
class SinhVienController extends Controller
{
    public function index()
    {
        $sinhviens = SinhVien::all();
        return view('sinhviens.index', ['sinhviens' =>  $sinhviens]);
    }

    public function destroy($id)
    {
        // Tìm sinh viên theo ID
        $sinhvien = SinhVien::find($id);
    

    
        // Xóa dữ liệu liên quan trong bảng `HocPhi` và `Ketqua`
        HocPhi::where('MASV', $sinhvien->MASV)->delete();
        Ketqua::where('MASV', $sinhvien->MASV)->delete();
    
        // Sau đó xóa sinh viên
        $sinhvien->delete();
    
        return redirect()->route('sinhviens.index');
    }

    public function edit($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        return view('sinhviens.edit' ,compact('sinhvien'));
    }
    

    public function update(Request $request,  $id)
    {
        $request -> validate([
            'MASV' => 'required|string|max:10',
            'HOSV' => 'required|string|max:255',
            'TENSV' => 'required|string|max:255',
            'MALOP' => 'required|string|max:255',
            'GIOITINH' => 'nullable|string|max:255',
            'DIACHI' => 'nullable|string|max:255',
            'SDT' => 'nullable|string|max:255',

        ]);


        $sinhvien = SinhVien::find($id);
        $sinhvien -> update($request -> all());
        return redirect()-> route('sinhviens.index');


    }

    public function show($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $ketqua = Ketqua::where('MASV', $sinhvien->MASV)
        ->join('MONHOC', 'KETQUA.MAMH', '=', 'MONHOC.MAMH')
        ->select('MONHOC.TENMH', 'KETQUA.DIEM', 'KETQUA.KiHOC')
        ->get();

      //  dd($ketqua);
        return view('sinhviens.show', compact('sinhvien', 'ketqua'));

    }


    
}
