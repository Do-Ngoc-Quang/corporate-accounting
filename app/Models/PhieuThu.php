<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuThu extends Model
{
    use HasFactory;
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'NgayChungTu', 'SoChungTu', 'HoTen', 'DiaChi', 'SoChungTuGoc', 'MaKhachHang', 'TenKhachHang', 'MaSoThue', 'DienGiai', 'BieuThue', 'SoXeRy', 'SoHoaDon', 'NgayHoaDon', 'ThueSuat', 'MatHang'
    ];
}
