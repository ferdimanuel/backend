<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_cuti';

    // Jika primary key adalah 'id_pengajuan_cuti'
    protected $primaryKey = 'id_pengajuan_cuti';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nip', 'tanggal_mulai', 'tanggal_berakhir', 'alasan_cuti', 'tipe_cuti', 'status_pengajuan',
    ];

    // Relasi ke pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }
}
