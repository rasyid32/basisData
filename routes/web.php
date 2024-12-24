<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'check'])->name('login.check');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/dashboard', DosenController::class)->middleware('auth');
