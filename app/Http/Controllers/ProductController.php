<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
        $data['date'] = $request->date;
        $data['products'] = Product::where('city_id', $request->regency)->get();
        return view('product', $data);
    }

    public function detail(Request $request)
    {
        $id = Crypt::decrypt($request->id);
        $data['hotel'] = Product::find($id);
        $data['date'] = $request->date;
        // var_dump($data['product']);
        return view('detail', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $data['products'] = Product::where('name', 'LIKE', "%{$keyword}%")->get();
        $data['keyword'] = $keyword;
        return view('search', $data);
    }
}
