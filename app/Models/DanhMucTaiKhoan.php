<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucTaiKhoan extends Model
{
    use HasFactory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'TaiKhoan', 'TenTaiKhoan', 'SoDuNoDau', 'SoDuCoDau', 'CoDinhKhoan', 'Cap', 'NgaySoDu'
    ];
}
