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
use App\Http\Controllers\UserTypeController;
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

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/create', [ProductController::class, 'create']);
        Route::post('/store', [ProductController::class, 'store'])->name('createProduct');
        Route::get('/detail/{id}', [ProductController::class, 'show']);
        Route::get('/delete/{id}', [ProductController::class, 'destroy']);
        Route::get('/restore/{id}', [ProductController::class, 'restore']);
        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/update', [ProductController::class, 'update'])->name('updateProduct');
    });
    Route::prefix('payments')->group(function () {
        Route::get('/', [PaymentController::class, 'index']);
        Route::get('/delete/{id}', [PaymentController::class, 'destroy']);
        Route::get('/restore/{id}', [PaymentController::class, 'restore']);
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/detail/{id}', [OrderController::class, 'show']);
        Route::get('/check/{id}', [OrderController::class, 'check']);
        Route::get('/delete/{id}', [OrderController::class, 'destroy']);
        Route::get('/restore/{id}', [OrderController::class, 'restore']);
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user_type', [UserTypeController::class, 'index']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/vouchers', [VoucherController::class, 'index']);
    Route::get('/notifies', [NotifyController::class, 'index']);

    Route::prefix('product_types')->group(function () {
        Route::get('/', [ProductTypeController::class, 'index']);
        Route::get('/detail/{id}', [ProductTypeController::class, 'show']);
        Route::get('/create', [ProductTypeController::class, 'create']);
        Route::get('/delete/{id}', [ProductTypeController::class, 'destroy']);
    });

});

