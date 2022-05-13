<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $data['bookings'] = Booking::where('user_id', Auth::id())->get();
        return view('profile', $data);
    }

    public function edit()
    {
        $data['user'] = Auth::user();
        return view('edit', $data);
    }

    public function update(UserUpdateRequest $request)
    {
        $user = $request->user();
        if (!$request->password) {
            unset($request['password']);
        }
        ($request->has('password')) ? $request->merge(['password' => Hash::make($request->post()['password'])]) : "";
        $user->update($request->all());
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
