<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/',[DashboardController::class, 'index'])->name('/')->middleware('checklogin');

Route::get('/login',function(){
    return view('login.index');
})->name('login');

Route::get('/register',function(){
    return view('register.index');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/products',function(){
    return view('products.index');
})->middleware('checklogin');
Route::get('/order',function(){
    return view('order.index');
});
Route::get('/payment',function(){
    return view('payment.index');
});

