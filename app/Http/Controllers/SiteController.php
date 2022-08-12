<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Review;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function about()
    {
        $data['product'] = Product::count();
        $data['transaction'] = Booking::count();
        $data['user'] = User::count();
        $data['review'] = round(Review::avg('total_rating'), 1);
        $data['reviews'] = Review::select('reviews.*', 'users.name', 'users.picture')->join('users', 'users.id', '=', 'reviews.user_id')->get()->take(6);
        $data['site'] = Site::first();
        return view('about', $data);
    }

    public function contact()
    {
        $data['site'] = Site::first();
        return view('contact', $data);
    }
}
