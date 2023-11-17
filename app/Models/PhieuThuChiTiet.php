<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuThuChiTiet extends Model
{
    use HasFactory;
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'Maso', 'MaChungTu', 'DienGiaiChiTiet', 'SoTien', 'TaiKhoanNo', 'TaiKhoanCo'
    ];
}
