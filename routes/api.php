<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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

Route::get('/all-published-category',[APIController::class,'getAllPublishedCategory']);
Route::get('/all-trending-product',[APIController::class,'getAllTrendingProduct']);
Route::get('/get-product-basic-info/{id}',[APIController::class,'getProductBasicInfo']);
Route::get('/get-product-detail-info/{id}',[APIController::class,'getProductDetailInfo']);
Route::get('/product-by-category-id/{id}',[APIController::class,'ProductByCategory']);

