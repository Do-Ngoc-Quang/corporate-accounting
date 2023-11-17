<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuXuatHangHoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'NgayChungTu', 'SoChungTu', 'MaKhachHang', 'TenKhachHang', 'MaSoThue', 'TaiKhoanNoGiaVon', 'TaiKhoanCoGiaVon', 'TaiKhoanNoGiaBan', 'TaiKhoanCoGiaBan', 'TaiKhoanCoGTGT', 'DienGiai', 'MatHang', 'ThueSuat', 'ThueGTGT',  'SoXeRy', 'SoHoaDon', 'NgayHoaDon'
    ];
}
