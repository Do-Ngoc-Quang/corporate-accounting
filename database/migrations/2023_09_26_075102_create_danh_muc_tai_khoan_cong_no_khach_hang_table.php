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
        Schema::create('danh_muc_tai_khoan_cong_no_khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('TaiKhoan');
            $table->foreign('TaiKhoan')->references('TaiKhoan')->on('danh_muc_tai_khoans');
            $table->string('MaKhachHang');
            $table->foreign('MaKhachHang')->references('MaKhachHang')->on('danh_muc_khach_hangs');
            $table->double('SoDuNoDau');
            $table->double('SoDuCoDau');
            $table->date('NgaySoDu');
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
        Schema::dropIfExists('danh_muc_tai_khoan_cong_no_khach_hangs');
    }
};
