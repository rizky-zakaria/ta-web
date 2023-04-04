<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('penanggung_jawab');
            $table->string('kegiatan');
            $table->text('lokasi');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->string('waktu');
            $table->integer('pemohon_id');
            $table->integer('petugas_id');
            $table->string('kk');
            $table->string('ktp');
            $table->string('sp');
            $table->string('status');
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
        Schema::dropIfExists('permohonans');
    }
}
