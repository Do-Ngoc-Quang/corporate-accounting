<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChungTuGhiSoChiTiet extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'DienGiaiChiTiet', 'SoTien', 'TaiKhoanNo', 'TaiKhoanCo'
    ];
}
