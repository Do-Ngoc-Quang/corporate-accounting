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
        Schema::create('phieu_xuat_hang_tra_lai_chi_tiets', function (Blueprint $table) {
            $table->id();
            // $table->string('MaSo')->unique();
            $table->string('MaChungTu');
            $table->foreign('MaChungTu')->references('MaChungTu')->on('phieu_xuat_hang_tra_lais');
            $table->string('MaHang');
            $table->foreign('MaHang')->references('MaHang')->on('danh_muc_hang_hoas');
            $table->string('DonViTinh');
            $table->double('SoLuong');
            $table->double('DonGiaVon');
            $table->double('ThanhTienGiaVon');
            $table->double('DonGiaMua');
            $table->double('ThanhTienGiaMua');
            $table->string('MaChungTuNhap');
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
        Schema::dropIfExists('phieu_xuat_hang_tra_lai_chi_tiets');
    }
};
