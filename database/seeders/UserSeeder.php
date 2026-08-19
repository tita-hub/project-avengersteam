<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'   => 'admin',
                'password'   => Hash::make('password'),
                'nama'       => 'Administrator',
                'role'       => 'admin',
                'created_at' => now(),
            ],
            [
                'username'   => 'user',
                'password'   => Hash::make('password'),
                'nama'       => 'Staff User',
                'role'       => 'user',
                'created_at' => now(),
            ],
        ]);
    }
}