<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $data['provinces'] = DB::connection('mysql2')
            ->table('provinces')
            ->select('*')
            ->get();
        $data['product'] = Product::count();
        $data['transaction'] = 0;
        $data['products'] = Product::all()->take(3);
        return view('home', $data);
    }
}
