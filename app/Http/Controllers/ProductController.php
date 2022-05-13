<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    //
    public function hotel(Request $request)
    {
        $response = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota/' . $request->regency);
        $res = $response->json();
        $city = $res['nama'];
        $data['city'] = $city;
        $data['date'] = $request->date;
        $data['products'] = Product::where('city_id', $request->regency)->get();
        return view('product', $data);
    }

    public function detail(Request $request)
    {
        $id = Crypt::decrypt($request->id);
        $data['hotel'] = Product::find($id);
        $data['date'] = $request->date;
        $data['user'] = Auth::user();
        $data['reviews'] = Review::select('reviews.*', 'users.name', 'users.picture')->join('users', 'users.id', '=', 'reviews.user_id')->where('product_id', $id)->orderBy('id', 'DESC')->get();
        $data['total_star'] = round(Review::where('product_id', $id)->avg('total_rating'), 1);
        $data['r0'] = floor(Review::where('product_id', $id)->avg('r0'));
        $data['r1'] = floor(Review::where('product_id', $id)->avg('r1'));
        $data['r2'] = floor(Review::where('product_id', $id)->avg('r2'));
        $data['r3'] = floor(Review::where('product_id', $id)->avg('r3'));
        $data['r4'] = floor(Review::where('product_id', $id)->avg('r4'));
        return view('detail', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $data['products'] = Product::where('name', 'LIKE', "%{$keyword}%")->get();
        $data['keyword'] = $keyword;
        $data['date'] = $request->date;
        return view('search', $data);
    }
}
