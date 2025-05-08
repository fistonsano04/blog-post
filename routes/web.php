<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('register', function () {
    return view('register');
})->name('register');
Route::post('logout', function () {
    // Handle logout logic here
    return redirect()->route('login');
})->name('logout');
