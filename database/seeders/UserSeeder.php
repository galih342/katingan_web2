<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Kepala Desa
        User::create([
            'name' => 'Bapak Kepala Desa',
            'email' => 'kades@desa.id',
            'password' => Hash::make('password123'),
            'role' => 'kepala_desa',
        ]);

        // 2. Akun Sekretaris
        User::create([
            'name' => 'Ibu Sekretaris',
            'email' => 'sekdes@desa.id',
            'password' => Hash::make('password123'),
            'role' => 'sekretaris',
        ]);

        // 3. Akun Kaur
        User::create([
            'name' => 'Staf Kaur',
            'email' => 'kaur@desa.id',
            'password' => Hash::make('password123'),
            'role' => 'kaur',
        ]);
    }
}