<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;
    protected $table = 'lop';
    protected $primaryKey = 'malop';
    public $timestamps = false;
    protected $fillable = ['malop','manganh', 'giangvienphutrach'];
//    public function sinhvien()
//    {
//        return $this->hasMany(SinhVien::class, 'malop', 'malop');
//    }

}
