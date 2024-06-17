<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CarController;

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

//Auth Routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('/');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

//Home Routes
Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

//Profile & Password Route
Route::post('/password/update', [HomeController::class, 'password_update'])->name('admin.password.update');

//User Route
Route::get('/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/users/data', [UserController::class, 'data'])->name('admin.users.data');
Route::post('/users/status', [UserController::class, 'status'])->name('admin.users.status');

//Cars Route
Route::get('/add_new_car', [CarController::class, 'add_car'])->name('admin.add_new_car');
Route::post('/save-car', [CarController::class, 'save_car'])->name('admin.save_car');

Route::get('/car_list', [CarController::class, 'index'])->name('admin.car_list');
Route::get('/carDataTable', [CarController::class, 'carDataTable'])->name('admin.carDataTable');
Route::get('/car_detail/{id}', [CarController::class, 'car_detail'])->name('admin.car_detail');
Route::get('/edit_car/{id}', [CarController::class, 'edit_car'])->name('admin.edit_car');
Route::get('/car_activate', [CarController::class, 'car_activate'])->name('admin.car_activate');
Route::get('/car_deactivate', [CarController::class, 'car_deactivate'])->name('admin.car_deactivate');
Route::get('/car_delete', [CarController::class, 'car_delete'])->name('admin.car_delete');

//Booking Route
Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings');

//Booking Route
Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports');
