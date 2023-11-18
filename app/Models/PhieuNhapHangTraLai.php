<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhapHangTraLai extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'NgayChungTu', 'SoChungTu', 'DienGiai', 'MaKhachHang', 'TenKhachHang', 'MaSoThue', 
        'TaiKhoanNoGiaVon', 'TaiKhoanCoGiaVon', 'TaiKhoanNoGiaBan', 'TaiKhoanNoGTGT', 'TaiKhoanCoGiaBan', 'BieuThue', 
        'SoXeRy', 'SoHoaDon', 'NgayHoaDon', 'ThueSuat', 'ThueGTGT', 'MatHang'
    ];
}
