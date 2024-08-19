<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PegawaiFactory extends Factory
{
    protected $model = Pegawai::class;

    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'departemen' => $this->faker->randomElement(['IT', 'HR', 'Finance']),
            'jabatan' => $this->faker->jobTitle(),
            'tanggal_masuk_kerja' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'jatah_cuti_tahunan' => 12,
            'jatah_cuti_sakit' => 6,
            'sisa_cuti' => 12,
        ];
    }
}
