<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotNghiepController extends Controller
{
    public function getThongKeTotNghiep(Request $request)  
    {  
        $kyhoc = $request->input('kyHoc');  
    
        try {  
            $results = DB::select('EXEC thongkesinhvientotnghiep ?', [$kyhoc]);  
            return response()->json($results);  
        } catch (\Exception $e) {  
            //   
   
            return response()->json(['error' => 'Có lỗi trong quá trình thực thi: ' . $e->getMessage()], 500);  
       
        }  
    }
}
