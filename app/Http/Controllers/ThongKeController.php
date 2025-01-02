<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $top5Lop = DB::table('vw_THONGKELOP')
            ->select('MALOP','GPA_TRUNGBINH')
            ->orderByDesc('GPA_TRUNGBINH')
            ->limit(5)
            ->get();
        $data = DB::table('vw_THONGKELOP')->get();
        $khoas = DB::table('KHOA')->select('MAKHOA', 'TENKHOA')->get();
        $dataChart = DB::table('vw_THONGKE_THEO_GPA')->get();
        return view('thongke.index', compact('dataChart','khoas','data', 'top5Lop'));
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
