<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BuktiPembayaran;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

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
            'total_price' => $request->total,
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
        $rekening = Rekening::where('rekening.id', $transaction->id_rekening)->join('banks', 'rekening.id_bank', '=', 'banks.id')->first();
        $proof = BuktiPembayaran::where('id_booking', $transaction->id)->count();
        $bukti = BuktiPembayaran::where('id_booking', $transaction->id)->first();
        $data['result'] = $transaction;
        $data['rekening'] = $rekening;
        $data['proof'] = $proof;
        $data['bukti'] = $bukti;
        return view('booking', $data);
    }

    public function cancel(Request $request)
    {
        $code = $request->kode;
        $transaction = Booking::where('code_booking', $code)->first();
        $transaction->status = 3;
        $transaction->save();
        // return redirect()->route('home')->with('success', 'Booking canceled successfully');
        return Redirect::back()->with('status', 'Booking berhasil dibatalkan');
    }

    public function payment(Request $request)
    {
        $code = $request->id_booking;
        $transaction = Booking::where('id', $code)->first();
        $transaction->status = 2;
        $transaction->payment_type = $request->payment_type;
        $transaction->id_rekening = $request->payment_type == "bank" ? $request->id_rekening : null;
        $transaction->save();
        // return redirect()->route('home')->with('success', 'Booking canceled successfully');
        return Redirect::back()->with('status', 'Silahkan melakukan pembayaran');
    }

    public function proof(Request $request)
    {
        $fileimage = $request->file('image');
        $nameimage = time() . '.' . $fileimage->getClientOriginalExtension();
        $fileimage->move(public_path('images/bukti'), $nameimage);

        $fullPathUriImage = '/images/bukti/' . $nameimage;

        $code = $request->id_booking;
        $transaction = Booking::where('id', $code)->first();
        $transaction->status = 2;
        $transaction->save();

        BuktiPembayaran::create([
            'id_booking' => $code,
            'gambar' => $fullPathUriImage,
            'id_user' => auth()->user()->id ?? 0
        ]);
        // return redirect()->route('home')->with('success', 'Booking canceled successfully');
        return Redirect::back()->with('status', 'Silahkan menunggu konfirmasi dari admin');
    }
}
