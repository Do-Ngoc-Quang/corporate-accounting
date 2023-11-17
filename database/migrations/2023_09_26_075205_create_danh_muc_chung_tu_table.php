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
        Schema::create('danh_muc_chung_tus', function (Blueprint $table) {
            $table->id();
            $table->string('MaLoaiChungTu')->unique();
            $table->string('TenLoaiChungTu');
            $table->string('TenBang');
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
        Schema::dropIfExists('danh_muc_chung_tus');
    }
};
