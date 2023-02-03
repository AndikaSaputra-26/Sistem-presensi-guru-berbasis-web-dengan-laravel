<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_absen', function (Blueprint $table) {
            $table->id();
            $table->string('jam_masuk');
            $table->time('jam_pulang');
            $table->string('keterangan');
            $table->enum('status',[0,1]); // 0 = non-aktif, 1 = aktif
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
        Schema::dropIfExists('setting_absen');
    }
}
