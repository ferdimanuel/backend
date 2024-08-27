<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\PengajuanCuti;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat 50 pegawai
        Pegawai::factory(50)->create()->each(function ($pegawai) {
            // Buat 3 pengajuan cuti untuk setiap pegawai
            PengajuanCuti::factory(3)->create(['nip' => $pegawai->nip]);
        });
    }
}

