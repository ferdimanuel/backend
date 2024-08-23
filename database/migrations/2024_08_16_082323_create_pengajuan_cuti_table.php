<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanCutiTable extends Migration
{
    public function up()
    {
        Schema::create('pengajuan_cuti', function (Blueprint $table) {
            $table->id('id_pengajuan_cuti');
            $table->foreignId('id_pegawai')
                  ->constrained('pegawai', 'id_pegawai')
                  ->onDelete('cascade'); // pastikan menggunakan 'id_pegawai'
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->string('alasan_cuti');
            $table->string('tipe_cuti');
            $table->string('status_pengajuan')->default('Dalam Proses');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajuan_cuti');
    }
}
