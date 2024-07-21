<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Admin'
        ]);

        User::create([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Dokter'
        ]);

        User::create([
            'name' => 'Pasien',
            'email' => 'pasien@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Pasien'
        ]);

        User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Owner'
        ]);
    }
}
