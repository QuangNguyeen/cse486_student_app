<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'SINHVIEN'; 
    protected $primaryKey = 'MASV';

    protected $fillable = [
        'MASV', 'HOSV', 'TENSV', 'MALOP', 'GIOITINH', 'DIACHI', 'SDT', 'HOCBONG', 'DRL', 'TRANGTHAI'
    ];
}
