<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewPasswordController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductTypeController;
use App\Http\Controllers\API\UserController ;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\VoucherController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotifyController;

use App\Models\ProductType;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*----------------------------------------------------------------*/
//public Route
Route::post('login', [AuthController::class, 'login'] );
Route::post('register', [AuthController::class, 'register']);
Route::post('/forgot-password',[NewPasswordController::class,'forgotPassword']);
Route::post('reset-password',[NewPasswordController::class,'resetPassword']);


Route::get('products', [ProductController::class ,'index']);
Route::get('products/{id}', [ProductController::class ,'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/profile', [AuthController::class ,'getProfile']);
    Route::prefix('products')->group(function () {
        Route::post('/',[ProductController::class, 'store']);
        Route::put('/{id}',[ProductController::class, 'update']);
        Route::delete('/{id}',[ProductController::class, 'destroy']);
    });
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});

//Product_type
Route::prefix('product_type')->group(function () {
    Route::get('/', [ProductTypeController::class, 'getAllProductType']);
    Route::get('/{id}', [ProductTypeController::class, 'getAllDetailProductType']);
});
//Order
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'getAllOrder']);
    Route::get('/status', [OrderController::class, 'getAllOrderStatus']);
});
//Payment
Route::prefix('payment')->group(function () {
    Route::get('/', [PaymentController::class, 'getAllPayment']);
});
//Delivery_Method
Route::prefix('delivery_method')->group(function () {
    Route::get('/', [DeliveryController::class, 'getAllDeliveryMethod']);
});

//UserType
Route::prefix('user_type')->group(function () {
    Route::get('/', [UserTypeController::class, 'getAllUserType']);
});
//User
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::put('/update/{id}',  [UserController::class, 'update']); 
});
//Comment
Route::prefix('comment')->group(function () {
    Route::get('/', [CommentController::class, 'getAllComment']);
});
//Voucher
Route::prefix('voucher')->group(function () {
    Route::get('/', [VoucherController::class, 'getAllVoucher']);
});
//Notify
Route::prefix('notify')->group(function () {
    Route::get('/', [NotifyController::class, 'getAllNotify']);
    Route::delete('/{id}',[NotifyController::class, 'destroy']);
});



