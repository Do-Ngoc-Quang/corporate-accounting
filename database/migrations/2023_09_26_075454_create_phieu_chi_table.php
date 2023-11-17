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
        Schema::create('phieu_chis', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu')->unique();
            $table->string('LoaiChungTu');
            $table->string('SoChungTu');
            $table->date('NgayChungTu');
            $table->string('HoTen');
            $table->string('DiaChi');
            $table->double('SoChungTuGoc');
            $table->string('MaKhachHang');
            $table->string('TenKhachHang');
            $table->string('MaSoThue');
            $table->string('DienGiai');
            $table->string('BieuThue');
            $table->string('SoXeRy');
            $table->string('SoHoaDon');
            $table->date('NgayHoaDon');
            $table->double('ThueSuat');
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
        Schema::dropIfExists('phieu_chis');
    }
};
