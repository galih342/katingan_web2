<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Membuat NIK acak 16 digit
        // Ganti baris NIK yang lama dengan ini:
'nik' => $this->faker->unique()->numerify('62##############'), // 62 + 14 digit = 16 digit pas.
            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'alamat' => $this->faker->address(),
            'pekerjaan' => $this->faker->jobTitle(),
        ];
    }
}