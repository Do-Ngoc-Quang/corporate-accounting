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
        Schema::create('danh_muc_tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('TaiKhoan')->unique();
            $table->string('TenTaiKhoan');
            $table->double('SoDuNoDau'); 
            $table->double('SoDuCoDau');
            $table->boolean('CoDinhKhoan');
            $table->string('Cap');
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
        Schema::dropIfExists('danh_muc_tai_khoans');
    }
};
