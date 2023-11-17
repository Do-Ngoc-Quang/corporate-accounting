<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucHangHoa extends Model
{
    use HasFactory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'MaHang', 'TenHang', 'NhomHang', 'DonViTinh', 'SoLuongTonDau', 'ThanhTienTonDau', 'NgayTonDau'
    ];
}
