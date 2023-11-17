<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuChiChiTiet extends Model
{
    use HasFactory;

    protected $fillable = [
        'Maso', 'MaChungTu', 'DienGiaiChiTiet', 'SoTien', 'TaiKhoanNo', 'TaiKhoanCo'
    ];

}
