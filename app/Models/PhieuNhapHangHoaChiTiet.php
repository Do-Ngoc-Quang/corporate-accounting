<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhapHangHoaChiTiet extends Model
{
    use HasFactory;

    protected $fillable = [
        'MaChungTu', 'MaHang', 'DonViTinh', 'SoLuong', 'DonGia', 'ThanhTien'
    ];
}
