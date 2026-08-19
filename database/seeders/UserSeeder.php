<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * PENTING: hash password di database.sql lama tidak bisa dipakai lagi
     * di sini karena plaintext aslinya tidak diketahui (hash bcrypt tidak
     * bisa "dibalik"). Ganti 'ganti_password_ini' dengan password admin
     * yang baru sebelum dipakai di server sungguhan.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'password' => 'admin123', // otomatis di-hash oleh cast 'hashed' di Model User
                'nama'     => 'Administrator',
                'role'     => 'admin',
            ]
        );
    }
}
