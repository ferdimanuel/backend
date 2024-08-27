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
            $table->string('nip'); // Pastikan tipe data cocok dengan model Pegawai
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->string('alasan_cuti');
            $table->string('tipe_cuti');
            $table->string('status_pengajuan')->default('Dalam Proses');
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('nip')->references('nip')->on('pegawai')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('pengajuan_cuti');
    }
}
