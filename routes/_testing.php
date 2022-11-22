<?php

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    Auth::login(\App\Models\User::factory()->create());
});

Route::get('/create', function () {
    $modelClass = 'App\Models\\' . request('model');
    return $modelClass::factory()->create();
});

Route::get('/delete-booking', function () {
    $booking = Booking::orderBy('id', 'desc')->limit(1)->delete();

    return redirect()->route('home');
});
