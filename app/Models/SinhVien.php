<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    
}


