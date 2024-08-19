<?php

// app/Models/Pegawai.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'nama_lengkap',
        'departemen',
        'jabatan',
        'tanggal_masuk_kerja',
        'email',
        'password',
        'jatah_cuti_tahunan',
        'jatah_cuti_sakit',
        'sisa_cuti',
    ];

    // Relasi ke pengajuan cuti
    public function pengajuanCuti()
    {
        return $this->hasMany(PengajuanCuti::class, 'id_pegawai');
    }
}

