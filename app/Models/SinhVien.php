<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SinhVien extends Model
{
    public $timestamps = false; 
    protected $table = 'SINHVIEN'; 
    protected $primaryKey = 'MASV';

    protected $fillable = [
        'MASV', 'HOSV', 'TENSV', 'MALOP', 'GIOITINH', 'DIACHI', 'SDT', 'HOCBONG', 'DRL', 'TRANGTHAI'
    ];

    public function lop()
    {
        return $this->belongsTo(Lop::class, 'malop', 'malop');
    }

    public function hocphi()
    {
        return $this->hasMany(Hocphi::class, 'masv', 'masv');
    }

    public function ketqua()
    {
        return $this->hasMany(Ketqua::class, 'masv', 'masv');
    }

    public static function capNhatTrangThai()
    {
        // Lấy danh sách tất cả sinh viên
        $sinhviens = DB::table('sinhvien')->get();

        foreach ($sinhviens as $sinhvien) {
            // Gọi hàm ufn_TinhSoTinChiNo
            $soTinChiNo = DB::selectOne("SELECT dbo.ufn_TinhSoTinChiNo(?) AS sotinchino", [$sinhvien->MASV])->sotinchino;

            // Xác định trạng thái
            $trangThai = $soTinChiNo >= 27 ? 0: 1;

            // Cập nhật trạng thái
            DB::table('sinhvien')
                ->where('MASV', $sinhvien->MASV)
                ->update(['trangthai' => $trangThai]);
        }
    }
    
}


