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
            'nip' => $this->faker->unique()->numerify('#####'),
            'jabatan' => $this->faker->jobTitle(),
            'ruangan' => $this->faker->randomElement(['SIRS', 'IGD', 'Radiologi', 'THT', 'Farmasi', 'Kamar Operasi']),
            'alamat' => $this->faker->address(),
            'awal_masuk_kerja' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_handphone' => $this->faker->phoneNumber(),
            'password' => Hash::make('12345678'), // Password default // Default password untuk factory
        ];
    }
}
