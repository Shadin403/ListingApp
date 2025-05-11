<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::get('/login', function () {
    return inertia('Auth/Login');
})->name('login');
