<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhapHangHoa extends Model
{
    use HasFactory;
    protected $fillable =[
        'MaChungTu','LoaiChungTu','NgayChungTu','SoChungTu','MaKhachHang','TenKhachHang','MaSoThue','TaiKhoanNo','TaiKhoanNoGTGT','TaiKhoanCo','DienGiai','SoXeRy','SoHoaDon','NgayHoaDon','ThueSuat','ThueGTGT','MatHang'
    ];
}
