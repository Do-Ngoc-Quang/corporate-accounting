<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucTaiKhoanCongNoKhachHang extends Model
{
    use HasFactory;
    /**
     * Write code on Method
     *
     * @return response()
     */
     protected $fillable = [
        'TaiKhoan', 'MaKhachHang', 'SoDuNoDau', 'SoDuCoDau', 'NgaySoDu'
    ];
}
