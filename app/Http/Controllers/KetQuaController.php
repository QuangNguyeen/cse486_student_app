<?php

namespace App\Http\Controllers;

use App\Models\Lop;
use App\Models\SinhVien;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\KetQua;
use Illuminate\Support\Facades\DB;

class KetQuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $ketquas = KetQua::all();
//        return view('ketquas.index', compact('ketquas'));
    }
    public function danhSachKetQua($malop,$id){
        $sinhvien = SinhVien::findOrFail($id);
        $dsKetQua = DB::select('EXEC proc_THONGKEKETQUA @MASV = ?', [$sinhvien->MASV]);
        $lop = Lop::findOrFail($malop);
        // Trả về view với dữ liệu
        return view('thongke.ketquas.index', compact('sinhvien', 'dsKetQua', 'lop'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ketquas = DB::table('KETQUA')->get();
        return view('thongke.ketquas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'mamh' => 'required',
            'masv' => 'required',
            'diem' => 'required|numeric|min:0|max:10',
            'kihoc' => 'required'
        ]);

        // Tìm sinh viên theo MASV
        $sinhvien = SinhVien::where('MASV', $request->masv)->first();

        if (!$sinhvien) {
            return redirect()->back()->with('error', 'Sinh viên không tồn tại');
        }

        // Tạo bản ghi điểm cho sinh viên
        try{
            KetQua::create([
                'MAMH' => $request->mamh,
                'MASV' => $request->masv,
                'DIEM' => $request->diem,
                'KIHOC' => $request->kihoc
            ]);

            // Lấy mã lớp (MALOP) của sinh viên
            $malop = $sinhvien->MALOP;

            // Chuyển hướng về trang kết quả với thông tin MALOP và MASV
            return redirect()->route('thongke.ketquas', [
                'malop' => $malop,
                'id' => $request->masv,
            ])->with('success', 'Nhập điểm thành công!');
        }catch (QueryException $ex){
            $errorMessage = $ex->getMessage();
            // Truyền lỗi tới view
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ketqua = KetQua::findOrFail($id);
        return view('ketquas.edit', compact('ketqua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'MAMH'=>'required',
            'MASV'=>'required',
            'DIEM'=>'required'
        ]);
        $ketqua = KetQua::findOrFail($id);
        $ketqua->update($request->all());
        return redirect()->route('ketquas.index')->with('success', 'Cập nhật điểm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
