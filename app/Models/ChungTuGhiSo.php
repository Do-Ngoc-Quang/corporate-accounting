<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChungTuGhiSo extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'NgayChungTu', 'SoChungTu', 'HoTen', 'MaKhachHangNo', 'TenKhachHangNo', 'MaSoThueNo', 'MaKhachHangCo', 'TenKhachHangCo', 'MaSoThueCo', 'DienGiai', 'BieuThue', 'SoXeRy', 'SoHoaDon', 'NgayHoaDon', 'ThueSuat', 'ThueGTGT', 'MatHang'
    ];
}
