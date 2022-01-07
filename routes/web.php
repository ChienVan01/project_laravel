<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ProductTypeController;
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
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products/store', [ProductController::class, 'store'])->name('createProduct');
    Route::get('/products/detail/{id}', [ProductController::class, 'show']);
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/products/update', [ProductController::class, 'update'])->name('updateProduct');
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/vouchers', [VoucherController::class, 'index']);
    Route::get('/notifies', [NotifyController::class, 'index']);
    Route::get('/product_types', [ProductTypeController::class, 'index']);
    Route::get('/product_types/detail/{id}', [ProductTypeController::class, 'show']);
    Route::get('/product_types/create', [ProductTypeController::class, 'create']);
    Route::get('/product_types/delete/{id}', [ProductTypeController::class, 'destroy']);
});
