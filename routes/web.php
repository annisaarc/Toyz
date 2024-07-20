<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ToyController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AppController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', 'login')->name('login');
        Route::get('register', 'register')->name('register');
        route::post('login', 'userLogin')->name('user.login');
        route::post('register', 'userRegister')->name('user.register');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', 'logout')->name('logout');
        Route::middleware('admin')->group(function () {
            Route::get('admin', 'filter')->name('admin.home');
            Route::get("admin/filter/{category}", 'filter')->name('admin.filter');
        });
    });

    Route::get('/', 'index')->name('home');
    Route::get('search', 'search')->name('home.search');
    Route::get('item', 'item')->name('item');
    ROute::get('about', 'about')->name('about');
});

Route::prefix('toy')->controller(ToyController::class)->group(function () {
    Route::get('create', 'create')->name('toy.create');
    Route::post('store', 'store')->name('toy.store');
    Route::get('edit/{toy}', 'edit')->name('toy.edit');
    Route::post('update/{toy}', 'update')->name('toy.update');
    Route::delete('delete/{toy}', 'delete')->name('toy.delete');
    Route::get('detail/{toy}', 'detail')->name('toy.detail');
    Route::post('order/{toy}', 'order')->name('toy.order');
    Route::get('order/{toy}', 'order')->name('toy.order');
});

Route::controller(InvoiceController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('invoice', 'index')->name('invoice');
        Route::get('invoice/{invoice}', 'detail')->name('invoice.detail');
        Route::post('invoice', 'store')->name('invoice.store');
        Route::delete('invoice/{invoice}', 'delete')->name('invoice.delete');
    });
});

Route::controller(CheckoutController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('checkout', 'index')->name('checkout');
        Route::post('checkout', 'store')->name('checkout.store');
    });
});
