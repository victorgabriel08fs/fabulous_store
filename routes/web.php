<?php

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

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('order', 'OrderController');
    Route::get('/orderCreate/{product}', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create-page');
    Route::post('/orderCoupon/{product}', [App\Http\Controllers\OrderController::class, 'create'])->name('order.coupon');
    Route::resource('library', 'LibraryController');
    Route::resource('ticket', 'TicketController');
    Route::resource('product', 'ProductController');
    Route::post('/redeem', 'TicketController@redeem')->name('ticket.redeem');
    Route::prefix('admin')->middleware('admin')->group(function () {
    });

    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'home'])->name('admin.home.index');
    });
});
