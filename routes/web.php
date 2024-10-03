<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(fn() => [
    Route::inertia('customers', 'Customer/HomeCustomer')->name('customers.index')->middleware('customer'),
    Route::inertia('sellers', 'Seller/HomeSeller')->name('sellers.index')->middleware('seller'),

    Route::middleware('admin', )->group(fn() => [
        Route::prefix('admin')->group(function () {
            Route::resource('admins', AdminController::class)->except(['update']);
            Route::post('admins/{role}/update',[AdminController::class,'update'])->name('admins.update');
        }),
    ]),

]);
Route::inertia('login', 'Auth/Login')->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
