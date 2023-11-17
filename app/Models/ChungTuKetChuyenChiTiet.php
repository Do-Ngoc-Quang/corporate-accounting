<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChungTuKetChuyenChiTiet extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'DienGiaiChiTiet', 'TaiKhoanNo', 'TaiKhoanCo', 'SoTien'
    ];
}
