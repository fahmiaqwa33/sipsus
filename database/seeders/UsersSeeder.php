<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Import Hash untuk hashing password

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mengisi data pengguna
        User::create([
            'name' => 'Admin Kelurahan',
            'nik' => '1234567800000001',
            'password' => Hash::make('password123'), // Menggunakan hashing untuk password
            'role_id' => 1, // Role Admin
        ]);

        User::create([
            'name' => 'Admin RW',
            'nik' => '1234567800000002',
            'password' => Hash::make('password123'),
            'role_id' => 2, // Role RW
        ]);

        User::create([
            'name' => 'Admin RT',
            'nik' => '1234567800000003',
            'password' => Hash::make('password123'),
            'role_id' => 3, // Role RT
        ]);

        User::create([
            'name' => 'Warga',
            'nik' => '1234567800000004',
            'password' => Hash::make('password123'),
            'role_id' => 4, // Role Warga
        ]);
    }
}
