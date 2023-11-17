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
        Schema::create('chung_tu_ghi_sos', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu')->unique();
            $table->string('LoaiChungTu');
            $table->string('SoChungTu');
            $table->date('NgayChungTu');
            $table->string('HoTen');
            $table->string('MaKhachHangNo')->nullable();
            $table->string('TenKhachHangNo')->nullable();
            $table->string('MaSoThueNo')->nullable();
            $table->string('MaKhachHangCo')->nullable();
            $table->string('TenKhachHangCo')->nullable();
            $table->string('MaSoThueCo')->nullable();
            $table->string('DienGiai');
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
        Schema::dropIfExists('chung_tu_ghi_sos');
    }
};
