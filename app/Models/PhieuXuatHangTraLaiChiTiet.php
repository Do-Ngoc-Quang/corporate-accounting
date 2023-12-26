<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuXuatHangTraLaiChiTiet extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'MaHang', 'DonViTinh', 'SoLuong', 'DonGiaVon', 'ThanhTienGiaVon', 'DonGiaMua',
        'ThanhTienGiaMua', 'MaChungTuNhap'
    ];
}
