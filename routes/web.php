<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('redirect',[HomeController::class,'redirect']);
// products

Route::get('add_products',[AdminController::class,'add_products']);
Route::get('show_products',[AdminController::class,'show_products']);
Route::post('products',[AdminController::class,'products']);
Route::get('delete_products/{id}',[AdminController::class,'delete_products']);
Route::get('update/{id}',[AdminController::class,'update']);
Route::post('update_products/{id}',[AdminController::class,'update_products']);
Route::get('search',[HomeController::class,'search']);
Route::post('add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('show_cart',[HomeController::class,'show_cart']);
Route::get('delete_cart/{id}',[HomeController::class,'delete_cart']);
// order

Route::post('order',[HomeController::class,'order']);
Route::get('all_orders',[AdminController::class,'all_orders']);
Route::get('approved/{id}',[AdminController::class,'approved']);

// request
Route::get('/request',[HomeController::class,'request']);
Route::post('/request_sent',[HomeController::class,'request_sent']);

Route::get('all_request',[AdminController::class,'all_request']);

//notifiacation
Route::get('sms',[AdminController::class,'sms']);