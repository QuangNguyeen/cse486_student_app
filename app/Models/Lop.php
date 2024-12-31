<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;

    protected $table = 'lop';
    protected $primaryKey = 'malop';
    protected $fillable = ['malop', 'manganh', 'giangvien_phutrach'];

    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'manganh', 'manganh');
    }

    public function sinhvien()
    {
        return $this->hasMany(Sinhvien::class, 'malop', 'malop');
    }
}