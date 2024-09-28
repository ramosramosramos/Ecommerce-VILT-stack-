<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('admin')->group(fn() => [
 Route::prefix('admin')->group(function(){
        Route::resource('user', AdminController::class);
 })
]);

Route::middleware('auth')->group(fn() => [
    Route::inertia('/', 'Seller/Home')->name('home'),
    Route::inertia('user', 'Seller/User')->name('user'),
]);
Route::inertia('login', 'Auth/Login')->name('login');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
