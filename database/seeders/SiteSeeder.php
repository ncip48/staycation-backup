<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::insert([
            'name' => 'Traveloki',
            'address' => 'Jl. Raya Kedungwuni No. 1, Kedungwuni, Kec. Kedungwuni, Kota Bandung, Jawa Barat 40257',
            'phone' => '+6281212121212',
            'phone2' => '+6281212121212',
            'email' => 'samplemail@gmail.com',
            'email2' => 'sample2@gmail.com',
            'facebook' => 'https://www.facebook.com/traveloki',
            'twitter' => 'https://www.twitter.com/traveloki',
            'instagram' => 'https://www.instagram.com/traveloki',
            'whatsapp' => 'https://wa.me/6281212121212',
            'description' => 'Traveloki adalah sebuah website yang menyediakan informasi mengenai destinasi wisata di Indonesia.',
            'logo' => 'http://localhost:3000/images/logo.png',
            'favicon' => 'http://localhost:3000/images/favicon.png',
            'about' => 'Traveloki adalah sebuah website yang menyediakan informasi mengenai destinasi wisata di Indonesia.',
            'open' => '08.00 - 17.00',
            'close' => 'Hari Besar',
            'created_at' => now(),
        ])
    }
}
