<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Monhoc.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    use HasFactory;

    protected $table = 'monhoc';
    protected $primaryKey = 'mamh';
    protected $fillable = ['mamh', 'tenmh', 'sotinchi'];

    public function ketqua()
    {
        return $this->hasMany(Ketqua::class, 'mamih', 'mamih');
    }
}
