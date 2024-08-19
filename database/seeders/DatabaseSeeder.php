<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\PengajuanCuti;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat 10 pegawai dan setiap pegawai punya 3 pengajuan cuti
        Pegawai::factory(10)->create()->each(function ($pegawai) {
            PengajuanCuti::factory(3)->create(['id_pegawai' => $pegawai->id_pegawai]);
        });
    }
}
