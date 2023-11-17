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
        Schema::create('danh_muc_khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('MaKhachHang')->unique();
            $table->string('TenKhachHang');
            $table->string('MaSoThue');
            $table->string('DiaChi');
            $table->string('TinhThanhPho');
            $table->string('DienThoai');
            $table->string('Fax')->nullable();
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
        Schema::dropIfExists('danh_muc_khach_hangs');
    }
};
