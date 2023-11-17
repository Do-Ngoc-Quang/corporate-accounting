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
        Schema::create('danh_muc_hang_hoas', function (Blueprint $table) {
            $table->id();
            $table->string('MaHang')->unique();
            $table->string('TenHang');
            $table->string('NhomHang');
            $table->string('DonViTinh');
            $table->double('SoLuongTonDau');
            $table->double('ThanhTienTonDau');
            $table->date('NgayTonDau');
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
        Schema::dropIfExists('danh_muc_hang_hoas');
    }
};
