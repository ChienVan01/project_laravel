<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/product_type', [ProductTypeController::class, 'getAllProductType']);
// Route::get('/product', [ProductController::class, 'getAllProduct']);


Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'getAllProduct']);
});


Route::prefix('product_type')->group(function () {
    Route::get('/', [ProductTypeController::class, 'getAllProductType']);
});
