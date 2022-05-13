<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'dob' => '1990-01-01',
                'phone' => '081212121212',
                'address' => 'Jl. Raya Kedungwuni No. 1, Kedungwuni, Kec. Kedungwuni, Kota Bandung, Jawa Barat 40257',
                'role' => 1,
                'created_at' => now(),
            ],
            [
                'username' => 'elok',
                'name' => 'Dwi Elok Nuraini',
                'email' => 'dwieloknuraini773@gmail.com',
                'password' => Hash::make('dwielok30'),
                'dob' => '2002-06-30',
                'phone' => '081212121212',
                'address' => 'Jl Karas Prampelan, Ngawi, Jawa Timur',
                'role' => 0,
                'created_at' => now(),
            ],
        );
    }
}
