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
        Schema::create('phieu_xuat_hang_hoas', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu')->unique();
            $table->string('LoaiChungTu');
            $table->date('NgayChungTu');
            $table->string('SoChungTu');
            $table->string('MaKhachHang');
            $table->string('TenKhachHang');
            $table->string('MaSoThue');
            $table->string('TaiKhoanNoGiaVon');
            $table->string('TaiKhoanCoGiaVon');
            $table->string('TaiKhoanNoGiaBan');
            $table->string('TaiKhoanCoGiaBan');
            $table->string('TaiKhoanCoGTGT');
            $table->string('DienGiai');
            $table->string('MatHang');
            $table->double('ThueSuat');
            $table->double('ThueGTGT');
            $table->string('SoXeRy');
            $table->string('SoHoaDon');
            $table->date('NgayHoaDon');
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
        Schema::dropIfExists('phieu_xuat_hang_hoas');
    }
};
