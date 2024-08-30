<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Model
{
    use HasFactory, HasApiTokens;

    // Jika nama tabel tidak sesuai konvensi, tentukan nama tabel secara eksplisit
    protected $table = 'pegawai'; // Sesuaikan dengan nama tabel yang benar
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'nama_lengkap',
        'nip',
        'jabatan',
        'ruangan',
        'alamat',
        'awal_masuk_kerja',
        'email',
        'no_handphone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}

