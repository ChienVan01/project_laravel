<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('login');
});
Route::get('/login', [LoginController::class ,'index']);
Route::get('/register', [RegisterController::class ,'index']);
Route::get('/order', [OrderController::class ,'index']);
Route::get('/dashboard', [DashboardController::class ,'index']);
Route::get('/payment', [PaymentMethodController::class ,'index']);
Route::get('/404', function () {
    return view('404');
});