<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Khoa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;

    protected $table = 'khoa';
    protected $primaryKey = 'makhoa';
    protected $fillable = ['makhoa', 'tenkhoa', 'donviphi', 'sdt'];

    public function nganh()
    {
        return $this->hasMany(Nganh::class, 'makhoa', 'makhoa');
    }
}
