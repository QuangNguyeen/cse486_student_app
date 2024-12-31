<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketqua extends Model
{
    use HasFactory;

    protected $table = 'ketqua';
    protected $fillable = ['MAMH', 'MASV', 'KIHOC', 'DIEM', 'LANTHI']; // Viết hoa tên cột

    // Định nghĩa khóa chính (chú ý rằng Laravel không hỗ trợ khóa chính hợp thành)
    public function getKeyName()
    {
        return 'MASV'; // Bạn có thể chọn một trong các thuộc tính làm khóa
    }

    public function monhoc()
    {
        return $this->belongsTo(Monhoc::class, 'MAMH', 'MAMH'); // Viết hoa tên cột
    }

    public function sinhvien()
    {
        return $this->belongsTo(Sinhvien::class, 'MASV', 'MASV'); // Viết hoa tên cột
    }

    // Tạo một phương thức để lấy tất cả các khóa chính
    public function getPrimaryKeyAttributes()
    {
        return [
            'MAMH' => $this->MAMH,
            'MASV' => $this->MASV,
            'KIHOC' => $this->KIHOC,
        ];
    }
}
