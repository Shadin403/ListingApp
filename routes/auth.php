<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;

//Auth Routes

Route::middleware('guest')->group(function () {
    // ----------------- Register ------------------//
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');

    // ----------------- Login ------------------//
    // Route::get('/login', [::class, 'create'])->name('login');
    // Route::post('/login', [::class, 'store'])->name('login');

    Route::get('/login',   [AuthController::class, 'create'])->name('login');
    Route::post('/login',   [AuthController::class, 'store'])->name('login');
});
