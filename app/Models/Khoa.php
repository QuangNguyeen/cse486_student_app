<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'khoa';
    protected $primaryKey = 'makhoa';
    protected $fillable = ['makhoa', 'tenkhoa', 'donviphi', 'sdt'];

    public function nganh()
    {
        return $this->hasMany(Nganh::class, 'makhoa', 'makhoa');
    }
}
