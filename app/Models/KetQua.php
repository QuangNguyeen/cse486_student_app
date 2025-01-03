<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetQua extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'KETQUA';
    protected $fillable = ['MAMH', 'MASV', 'DIEM', 'KIHOC'];

}
