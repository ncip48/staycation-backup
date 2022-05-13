<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // var_dump($request->user_id);
        $rand = rand(1231, 7879);
        $code_booking = 'STY' . $rand;
        $transaction = Booking::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'code_booking' => $code_booking,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'duration' => $request->duration,
            'total_price' => $request->total_price,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 0
        ]);
        $code = Crypt::encrypt($transaction->code_booking);
        return redirect('booking?order=' . $code);
    }

    public function show(Request $request)
    {
        $id = Crypt::decrypt($request->order);
        $transaction = Booking::select('bookings.*', 'products.name as product_name', 'products.price as product_price')->where('code_booking', $id)->join('products', 'products.id', '=', 'bookings.product_id')->first();
        $data['result'] = $transaction;
        return view('booking', $data);
    }

    public function cancel(Request $request)
    {
        $code = Crypt::decrypt($request->code_booking);
        $transaction = Booking::where('code_booking', $code)->first();
        $transaction->status = 3;
        $transaction->save();
        return redirect()->route('home')->with('success', 'Booking canceled successfully');
    }
}
