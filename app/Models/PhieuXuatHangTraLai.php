<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuXuatHangTraLai extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'NgayChungTu', 'SoChungTu', 'DienGiai', 'MaKhachHang', 'TenKhachHang', 'MaSoThue', 
        'TaiKhoanNoGiaVon', 'TaiKhoanCoGiaVon', 'TaiKhoanNoGiaMua', 'TaiKhoanCoGTGT', 'TaiKhoanCoGiaMua', 'BieuThue', 
        'SoXeRy', 'SoHoaDon', 'NgayHoaDon', 'ThueSuat', 'ThueGTGT', 'MatHang'   
    ];
}
