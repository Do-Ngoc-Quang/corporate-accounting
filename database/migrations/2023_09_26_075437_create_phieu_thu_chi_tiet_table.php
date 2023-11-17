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
        Schema::create('phieu_thu_chi_tiets', function (Blueprint $table) {
            $table->id();
            // $table->string('Maso')->unique();
            $table->string('MaChungTu');
            $table->foreign('MaChungTu')->references('MaChungTu')->on('phieu_thus');
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
        Schema::dropIfExists('phieu_thu_chi_tiets');
    }
};
