<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
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



Route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::get('/register', function () {
    return view('register.index');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['checklogin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/detail/{id}', [ProductController::class, 'show']);
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
