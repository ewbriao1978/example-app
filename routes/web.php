<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class,'index']);
Route::get('/register',[HomeController::class,'register_product']);
Route::post('/register',[HomeController::class,'store_product']);
Route::get('/product/delete/{id}', [HomeController::class,'delete_product']);
Route::get('/product/edit/{id}', [HomeController::class,'edit_product_view']);
Route::post('/product/edit/{id}', [HomeController::class,'update_product']);
Route::post('/search',[HomeController::class,'searchQueryHeader']);
Route::get('/sorting',[HomeController::class,'sortingProduct']);
