<?php

// app/Models/Hocphi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hocphi extends Model
{
    use HasFactory;

    protected $table = 'hocphi';
    protected $fillable = ['masv', 'kihoc', 'candong', 'dadong'];

    protected $primaryKey = ['masv', 'kihoc'];

    public function sinhvien()
    {
        return $this->belongsTo(Sinhvien::class, 'masv', 'masv');
    }
}
