<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert(
            [
                'name' => 'Fave Hotel Madiun',
                'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/22/35/f7/34/favehotel-madiun-building.jpg?w=1000&h=600&s=1',
                'description' => 'Fave Hotel Madiun adalah hotel yang berada di kota Madiun, Jawa Timur.',
                'address' => 'Jl. Mayjen Sungkono No.43, Nambangan Kidul, Kec. Manguharjo, Kota Madiun, Jawa Timur 63128',
                'price' => '550000',
                'province_id' => '35',
                'province_name' => 'Jawa Timur',
                'city_id' => '3577',
                'city_name' => 'Madiun',
                'total_room' => '100',
                'created_at' => now(),
            ],
            [
                'name' => 'Fave Hotel Solo',
                'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/22/35/f7/34/favehotel-madiun-building.jpg?w=1000&h=600&s=1',
                'description' => 'Fave Hotel Solo adalah hotel yang berada di kota Solo, Jawa Tengah.',
                'address' => 'Jl. Ir. Soekarno, Dusun I, Madegondo, Kec. Grogol, Kabupaten Sukoharjo, Jawa Tengah 57552',
                'price' => '350000',
                'province_id' => '33',
                'province_name' => 'Jawa Tengah',
                'city_id' => '3372',
                'city_name' => 'Kota Surakarta',
                'total_room' => '50',
                'created_at' => now(),
            ],
            [
                'name' => 'Aston Madiun',
                'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/22/35/f6/c6/aston-madiun-building.jpg?w=1000&h=600&s=1',
                'description' => 'Aston Hotel Madiun adalah hotel yang berada di kota Madiun, Jawa Timur.',
                'address' => 'Jl. Mayjen Sungkono No.41, Nambangan Kidul, Kec. Manguharjo, Kota Madiun, Jawa Timur 63128',
                'price' => '350000',
                'province_id' => '35',
                'province_name' => 'Jawa Timur',
                'city_id' => '3577',
                'city_name' => 'Madiun',
                'total_room' => '35',
                'created_at' => now(),
            ],
        );
    }
}
