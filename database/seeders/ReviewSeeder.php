<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::insert(
            [
                'user_id' => 2,
                'product_id' => 1,
                'r0' => '5',
                'r1' => '5',
                'r2' => '5',
                'r3' => '5',
                'r4' => '5',
                'total_rating' => '5',
                'comment' => 'Sangat bagus',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'r0' => '2',
                'r1' => '2',
                'r2' => '2',
                'r3' => '2',
                'r4' => '2',
                'total_rating' => '2',
                'comment' => 'Jelekkk!!!',
                'created_at' => now(),
            ],
        );
    }
}
