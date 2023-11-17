<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuXuatHangHoaChiTiet extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'MaHang', 'DonViTinh', 'SoLuong', 'DonGiaVon', 'ThanhTienGiaVon', 'DonGiaBan', 'ThanhTienGiaBan', 'MaChungTuNhap'
    ];
}
