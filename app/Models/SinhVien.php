<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'sinhvien';
    public $timestamps = false;
    protected $primaryKey = 'masv';
    protected $fillable = [
        'masv',
        'hosv',
        'tensv',
        'malop',
        'gioitinh',
        'diachi',
        'sdt',
        'hocbong',
        'drl',
        'trangthai'
    ];
    public function lop()
    {
        return $this->belongsTo(Lop::class, 'malop', 'malop');
    }
}
