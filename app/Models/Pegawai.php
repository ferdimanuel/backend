<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    public $incrementing = false; // jika primary key bukan integer auto-increment
    protected $keyType = 'string'; // jika primary key bukan integer

    protected $fillable = [
        'nama_lengkap',
        'nip',
        'jabatan',
        'ruangan',
        'alamat',
        'awal_masuk_kerja',
        'email',
        'no_handphone'
    ];

    // Relasi ke pengajuan cuti
    public function pengajuanCuti()
    {
        return $this->hasMany(PengajuanCuti::class, 'nip', 'nip');
    }
}


