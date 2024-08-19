<?php

// database/factories/PengajuanCutiFactory.php

namespace Database\Factories;

use App\Models\PengajuanCuti;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengajuanCutiFactory extends Factory
{
    protected $model = PengajuanCuti::class;

    public function definition()
    {
        return [
            'id_pegawai' => Pegawai::factory(),
            'tanggal_pengajuan' => $this->faker->date(),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_berakhir' => $this->faker->date(),
            'alasan_cuti' => $this->faker->sentence(),
            'tipe_cuti' => $this->faker->randomElement(['Cuti Tahunan', 'Cuti Sakit']),
            'status_pengajuan' => 'Dalam Proses',
            'catatan_persetujuan' => null,
            'tanggal_persetujuan' => null,
        ];
    }
}
