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
        Schema::create('phieu_nhap_hang_hoas', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu')->unique();
            $table->string('LoaiChungTu');
            $table->date('NgayChungTu');
            $table->string('SoChungTu');
            $table->string('MaNguoiBan');
            $table->string('TenNguoiBan');
            $table->string('MaSoThueNguoiBan');
            $table->string('TaiKhoanNo');
            $table->string('TaiKhoanNoGTGT');
            $table->string('TaiKhoanCo');
            $table->string('DienGiai');
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
        Schema::dropIfExists('phieu_nhap_hang_hoas');
    }
};
