<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocPhi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hocphi';
    protected $fillable = ['masv', 'kihoc', 'candong', 'dadong'];

    protected $primaryKey = ['masv', 'kihoc'];

    public function sinhvien()
    {
        return $this->belongsTo(Sinhvien::class, 'masv', 'masv');
    }
}
