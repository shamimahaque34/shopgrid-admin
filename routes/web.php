<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AdminLoginController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->resource('category', CategoryController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('brand', BrandController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('unit', UnitController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('sub-category', SubCategoryController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/add-new-product', [ProductController::class, 'index'])->name('product.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/get-sub-category-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-product', [ProductController::class, 'create'])->name('product.new');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-product', [ProductController::class, 'manage'])->name('product.manage');
Route::middleware(['auth:sanctum', 'verified'])->get('/view-product-detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');



