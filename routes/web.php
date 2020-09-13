<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ShopController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/p/create', [PostsController::class,'create']);
Route::post('/p', [PostsController::class,'store']);
Route::get('/p/{post}', [PostsController::class,'show']);


Route::post('/shop', [ShopController::class,'store']);

Route::get('/pending', function(){
  return view('cart.itemsPending');
});

Route::get('/cart', [ShopController::class, 'index']);
Route::get('/cart/{info}/edit', [ShopController::class,'edit']);
Route::patch('/cart/{info}', [ShopController::class,'update']);

Route::get('/test/{post}/edit', [PostsController::class,'edit'])->name('test.edit');
Route::patch('/test/{post}', [PostsController::class,'update'])->name('test.update');


Route::get('/profile/{user}', [ProfilesController::class,'index'])->name('profile.show');
