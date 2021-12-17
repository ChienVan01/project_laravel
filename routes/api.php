<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Models\ProductType;
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
Route::post('login', [AuthController::class, 'login'] );
Route::post('register', [AuthController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout',[AuthController::class,'logout']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/product_type', [ProductTypeController::class, 'getAllProductType']);
// Route::get('/product', [ProductController::class, 'getAllProduct']);
  //Product
  Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'getAllProduct']);
});
//Product_type
Route::prefix('product_type')->group(function () {
    Route::get('/', [ProductTypeController::class, 'getAllProductType']);
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