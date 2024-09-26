<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('admin')->group(fn() => [
    Route::inertia('/admin', 'Admin/Admin')->name('admin')
]);

Route::middleware('auth')->group(fn() => [
    Route::inertia('/', 'Shop/Home')->name('home'),
    Route::inertia('user', 'Shop/User')->name('user'),
]);
Route::inertia('login', 'Auth/Login')->name('login');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
