<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuChi extends Model
{
    use HasFactory;

    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'SoChungTu', 'NgayChungTu', 'HoTen', 'DiaChi', 'SoChungTuGoc', 'MaKhachHang', 'TenKhachHang', 'MaSoThue', 'DienGiai', 'BieuThue', 'SoXeRy', 'SoHoaDon', 'NgayHoaDon', 'ThueSuat', 'MatHang'
    ];
}
