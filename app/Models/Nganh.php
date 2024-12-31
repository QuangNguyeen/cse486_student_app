<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;

    protected $table = 'nganh';
    protected $primaryKey = 'manganh';
    protected $fillable = ['manganh', 'makhoa', 'tennganh', 'sotinchi_batbuoc', 'loadaotao'];

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'makhoa', 'makhoa');
    }

    public function lop()
    {
        return $this->hasMany(Lop::class, 'manganh', 'manganh');
    }
}