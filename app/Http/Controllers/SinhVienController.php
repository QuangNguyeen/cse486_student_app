<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use Illuminate\Support\Facades\DB;
class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dsSinhVien = SinhVien::with('lop')->paginate(5);
        return view('sinhviens.index', compact('dsSinhVien'));
    }
    public function danhSachKetQua($id){
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
