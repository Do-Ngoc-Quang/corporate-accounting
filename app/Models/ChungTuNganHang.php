<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChungTuNganHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChungTu', 'LoaiChungTu', 'NgayChungTu', 'SoChungTu', 'HoTen', 'MaKhachHang', 'TenKhachHang', 'MaSoThue', 'DienGiai', 'ThuChi'
    ];
}
