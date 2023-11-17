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
        Schema::create('chung_tu_ngan_hang_chi_tiets', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu');
            $table->foreign('MaChungTu')->references('MaChungTu')->on('chung_tu_ngan_hangs');
            $table->string('DienGiaiChiTiet');
            $table->double('SoTien');
            $table->string('TaiKhoanNo');
            $table->string('TaiKhoanCo');
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
        Schema::dropIfExists('chung_tu_ngan_hang_chi_tiets');
    }
};
