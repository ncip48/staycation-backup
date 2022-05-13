<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Review;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['product'] = Product::count();
        $data['transaction'] = Booking::count();
        $data['products'] = Product::all()->take(3);
        $data['user'] = User::count();
        $data['review'] = round(Review::avg('total_rating'), 1);
        $data['reviews'] = Review::select('reviews.*', 'users.name', 'users.picture')->join('users', 'users.id', '=', 'reviews.user_id')->get()->take(6);
        $data['site'] = Site::first();
        return view('home', $data);
    }
}
