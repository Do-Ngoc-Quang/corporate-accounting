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
        Schema::create('chung_tu_ngan_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu')->unique();
            $table->string('LoaiChungTu');
            $table->date('NgayChungTu');
            $table->string('SoChungTu');
            $table->string('HoTen');
            $table->string('MaKhachHang');
            $table->string('TenKhachHang');
            $table->string('MaSoThue');
            $table->string('DienGiai');
            $table->double('ThuChi');
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
        Schema::dropIfExists('chung_tu_ngan_hangs');
    }
};
