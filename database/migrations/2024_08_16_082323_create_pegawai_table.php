<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai'); // pastikan menggunakan 'id_pegawai'
            $table->string('nama_lengkap');
            $table->string('departemen');
            $table->string('jabatan');
            $table->date('tanggal_masuk_kerja');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('jatah_cuti_tahunan')->default(12);
            $table->integer('jatah_cuti_sakit')->default(6);
            $table->integer('sisa_cuti')->default(12);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
