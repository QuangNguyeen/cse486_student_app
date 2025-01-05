<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SinhVien;
use App\Models\HocPhi;
use App\Models\Ketqua;
use App\Models\Lop;
use Illuminate\Support\Facades\DB;

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
        HocPhi::where('MASV', (string) $sinhvien->MASV)->delete();
        Ketqua::where('MASV', (string) $sinhvien->MASV)->delete();
    
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
        // Lấy thông tin sinh viên từ bảng vw_ThongTinSinhVien
            $sinhvien = DB::table('vw_ThongTinSinhVien')
            ->where('MASV', $id) // Lọc theo mã sinh viên
            ->select('HoSV', 'TenSV','MASV' ,'GioiTinh', 'DiaChi','MALOP', 'SDT')
            ->first();
    
        if (!$sinhvien) {
            abort(404, 'Sinh viên không tồn tại');
        }
    
        // Lấy kết quả học tập của sinh viên từ view vw_ThongTinSinhVien
            $ketqua = DB::table('vw_ThongTinSinhVien')
            ->where('MASV', $id) // Lọc theo mã sinh viên
            ->select('TenMH', 'Diem', 'KiHoc')
            ->get();
    
        // Trả về view với dữ liệu
        return view('sinhviens.show', compact('sinhvien', 'ketqua'));
    }
    


    public function updateStatus()
    {
        SinhVien::capNhatTrangThai();
        return redirect()->route('sinhviens.index')->with('success', 'Cập nhật trạng thái sinh viên thành công!');
    }

    public function create()
    {
        $classes = Lop::all();
        return view('sinhviens.create',compact('classes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'MASV' => 'required|string|max:10|unique:sinh_vien',
        'HOSV' => 'required|string|max:255',
        'TENSV' => 'required|string|max:255',
        'MALOP' => 'required|string|max:255',
        'GIOITINH' => 'nullable|string|max:255',
        'DIACHI' => 'nullable|string|max:255',
        'SDT' => 'nullable|string|max:255'
    ]);

    SinhVien::create($request->all());

    return redirect()->route('sinhviens.index')->with('success', 'Thêm sinh viên mới thành công!');
}
}
