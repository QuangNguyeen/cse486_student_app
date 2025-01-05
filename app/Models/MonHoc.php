<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'monhoc';
    protected $primaryKey = 'mamh';
    protected $fillable = ['mamh', 'tenmh', 'sotinchi'];

    public function ketqua()
    {
        return $this->hasMany(Ketqua::class, 'mamih', 'mamih');
    }
}
