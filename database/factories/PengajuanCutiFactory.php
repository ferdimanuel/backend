<?php

namespace Database\Factories;

use App\Models\PengajuanCuti;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengajuanCutiFactory extends Factory
{
    protected $model = PengajuanCuti::class;

    public function definition()
    {
        // Pastikan nip yang digunakan adalah milik pegawai yang sudah ada
        return [
            'nip' => $this->faker->randomElement(Pegawai::pluck('nip')->toArray()), // Ambil nip dari pegawai yang sudah ada
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_berakhir' => $this->faker->date(),
            'alasan_cuti' => $this->faker->sentence(),
            'tipe_cuti' => $this->faker->randomElement(['Cuti Tahunan', 'Cuti Sakit']),
            'status_pengajuan' => $this->faker->randomElement(['Dalam Proses', 'Disetujui', 'Ditolak']),
        ];
    }
}


