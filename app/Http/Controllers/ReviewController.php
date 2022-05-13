<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $total_rating = ($request->r0 + $request->r1 + $request->r2 + $request->r3 + $request->r4) / 5;
        Review::create(array_merge($request->all(), ['total_rating' => $total_rating]));
        return Redirect::back()->with('message', 'Operation Successful !');
    }
}
