<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DeliverController;
use App\Http\Controllers\BalanceController;

use App\Http\Controllers\LiveSearch;
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




Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('posts.browse');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/pending', function(){
  return view('cart.itemsPending');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/deliver', function(){
  return view('cart.itemsDeliver');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/history', function(){
  return view('cart.itemsHistory');
});

Route::get('/balance/{user}/edit', [BalanceController::class,'edit']);
Route::patch('/balance/{user}', [BalanceController::class,'update']);

Route::get('/p/create', [PostsController::class,'create']);
Route::post('/p', [PostsController::class,'store']);
Route::get('/p/{post}', [PostsController::class,'show']);

Route::get('/browse', [PostsController::class,'index']);
Route::get('browse/action', [PostsController::class,'action']);

Route::post('/shop', [ShopController::class,'store']);

Route::get('/deliver/{shop}/edit', [DeliverController::class,'edit']);
Route::patch('/deliver/{shop}', [DeliverController::class,'update']);

Route::get('/cart', [ShopController::class, 'index']);
Route::get('/cart/{info}/edit', [ShopController::class,'edit']);
Route::patch('/cart/{info}', [ShopController::class,'update']);
Route::delete('/cart/{info}/delete', [ShopController::class,'destroy']);

Route::get('/item/{post}/edit', [PostsController::class,'edit']);
Route::patch('/item/{post}', [PostsController::class,'update']);
Route::delete('/item/{post}/delete', [PostsController::class,'destroy']);

Route::get('/profile/{user}', [ProfilesController::class,'index'])->name('profile.show');
