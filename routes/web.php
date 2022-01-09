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
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Product's routes
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products/store', [ProductController::class, 'store'])->name('createProduct');
    Route::get('/products/detail/{id}', [ProductController::class, 'show']);
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/products/update', [ProductController::class, 'update'])->name('updateProduct');
    Route::get('/products/restore/{id}', [ProductController::class, 'restore']);
    
    //Voucher's routes
    Route::get('/vouchers', [VoucherController::class, 'index']);
    Route::get('/vouchers/create', [VoucherController::class, 'create']);
    Route::post('/vouchers/store', [VoucherController::class, 'store'])->name('createVoucher');
    Route::get('/vouchers/detail/{id}', [VoucherController::class, 'show']);
    Route::get('/vouchers/edit/{id}', [VoucherController::class, 'edit']);
    Route::post('/vouchers/update', [VoucherController::class, 'update'])->name('updateVoucher');
    Route::get('/vouchers/delete/{id}', [VoucherController::class, 'destroy']);
    Route::get('/vouchers/restore/{id}', [VoucherController::class, 'restore']);

    //User's routes
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/detail/{id}', [UserController::class, 'show']);
    Route::get('/users/block/{id}', [UserController::class, 'destroy']);
    Route::get('/users/unblock/{id}', [UserController::class, 'restore']);

    //Comment's routes

    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index']);
        Route::get('/detail/{id}', [CommentController::class, 'show']);
        Route::get('/delete/{id}', [CommentController::class, 'destroy']);
        Route::get('/restore/{id}', [CommentController::class, 'restore']);
    });

    //Notify's routes
    Route::prefix('notifies')->group(function () {
        Route::get('/', [NotifyController::class, 'index']);
        Route::get('/create', [NotifyController::class, 'create']);
        Route::post('/store', [NotifyController::class, 'store'])->name('createNotify');
        Route::get('/detail/{id}', [NotifyController::class, 'show']);
        Route::get('/edit/{id}', [NotifyController::class, 'edit']);
        Route::post('/update', [NotifyController::class, 'update'])->name('updateNotify');
        Route::get('/delete/{id}', [NotifyController::class, 'destroy']);
        Route::get('/restore/{id}', [NotifyController::class, 'restore']);
    });


});
