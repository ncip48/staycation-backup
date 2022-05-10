<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function hotel(Request $request)
    {
        // var_dump($request->regency);
        $data['city'] = DB::connection('mysql2')
            ->table('regencies')
            ->select('*')
            ->where('id', $request->regency)
            ->first();
        $data['products'] = Product::where('city_id', $request->regency)->get();
        return view('product', $data);
    }
}
