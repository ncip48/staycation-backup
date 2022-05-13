<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hotel', [App\Http\Controllers\ProductController::class, 'hotel'])->name('hotel');
Route::get('/detail', [App\Http\Controllers\ProductController::class, 'detail'])->name('detail');
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');
Route::post('/transaction', [App\Http\Controllers\BookingController::class, 'index'])->name('transaction');
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'show'])->name('show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit-profile');
    Route::patch('/edit-profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('update-profile');
    Route::post('/cancel-booking', [App\Http\Controllers\BookingController::class, 'cancel'])->name('cancel-booking');
    Route::post('/review', [App\Http\Controllers\ReviewController::class, 'create'])->name('create-review');
});
