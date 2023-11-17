<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_xuat_hang_tra_lais', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu')->unique();
            $table->string('LoaiChungTu');
            $table->date('NgayChungTu');
            $table->string('SoChungTu');
            $table->string('DienGiai');
            $table->string('MaKhachHang');
            $table->string('TenKhachHang');
            $table->string('MaSoThue');
            $table->string('TaiKhoanNoGiaVon');
            $table->string('TaiKhoanCoGiaVon');
            $table->string('TaiKhoanNoGiaMua');
            $table->string('TaiKhoanCoGTGT');
            $table->string('TaiKhoanCoGiaMua');
            $table->string('BieuThue');
            $table->string('SoXeRy');
            $table->string('SoHoaDon');
            $table->date('NgayHoaDon');
            $table->double('ThueSuat');
            $table->double('ThueGTGT');
            $table->string('MatHang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieu_xuat_hang_tra_lais');
    }
};
