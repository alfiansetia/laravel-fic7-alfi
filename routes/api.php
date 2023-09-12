<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CallbackController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('categories', CategoryController::class)->except(['index', 'show']);

    Route::get('orders', [OrderController::class, 'index']);

    Route::get('orders/{orders}', [OrderController::class, 'show']);
    
    Route::post('orders', [OrderController::class, 'store']);

    
});

Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);
Route::apiResource('products', ProductController::class)->only(['index', 'show']);

Route::post('midtrans/notification/handling', [CallbackController::class, 'callback']);
