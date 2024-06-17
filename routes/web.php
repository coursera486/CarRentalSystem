<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {return view('index'); })->name('index');
Route::get('/about', function () {return view('about'); })->name('about');
Route::get('/service', function () {return view('service'); })->name('service');
Route::get('/car', function () {return view('car'); })->name('car');
Route::get('/detail', function () {return view('detail'); })->name('detail');
Route::get('/booking', function () {return view('booking'); })->name('booking');
Route::get('/team', function () {return view('team'); })->name('team');
Route::get('/testimonial', function () {return view('testimonial'); })->name('testimonial');
Route::get('/contact', function () {return view('contact'); })->name('contact');
Route::get('/user_login', function () {return view('login'); })->name('user_login');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/bookingDataTable', [BookingController::class, 'bookingDataTable'])->name('bookingDataTable');

Route::get('/my-bookings', [BookingController::class, 'index'])->name('my_bookings');

Route::get('/new-booking', [BookingController::class, 'new_booking'])->name('new_booking');
Route::get('/car_book/{id}', [BookingController::class, 'car_book'])->name('car_book');
Route::get('/get_price', [BookingController::class, 'get_price'])->name('get_price');
Route::post('/add_booking', [BookingController::class, 'add_booking'])->name('add_booking');
Route::get('/get_booking_detail', [BookingController::class, 'get_booking_detail'])->name('get_booking_detail');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/save_profile', [ProfileController::class, 'save_profile'])->name('save_profile');
