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
        Schema::create('chung_tu_ket_chuyens', function (Blueprint $table) {
            $table->id();
            $table->string('MaChungTu')->unique();
            $table->string('LoaiChungTu');
            $table->string('SoChungTu');
            $table->date('NgayChungTu');
            $table->string('DienGiai');
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
        Schema::dropIfExists('chung_tu_ket_chuyens');
    }
};
