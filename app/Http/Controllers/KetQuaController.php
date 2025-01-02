<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
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

        // Trả về view với dữ liệu
        return view('thongke.ketquas.index', compact('sinhvien', 'dsKetQua'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ketquas = KetQua::all();
        return view('ketquas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MAMH'=>'required',
            'MASV'=>'required',
            'DIEM'=>'required'
        ]);
        KetQua::create($request->all());
        return redirect()->route('ketquas.index')->with('success', 'Nhập điểm thành công');
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
