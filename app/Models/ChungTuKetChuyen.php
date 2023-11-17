<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChungTuKetChuyen extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'SoChungTu', 'NgayChungTu', 'DienGiai'
    ];
}
