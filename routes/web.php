<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::get('register', function () {
    return view('auth.register');
})->name('register');
Route::post('logout', function () {
    // Handle logout logic here
    return redirect()->route('login');
})->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [BlogController::class, 'admin'])->name('dashboard');
    Route::post('/new-post', [BlogController::class, 'store'])->name('new-post');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('edit-post/{id}', [BlogController::class, 'edit'])->name('edit-post');
    Route::PUT('update/{id}', [BlogController::class, 'updateBlog'])->name('update-post');
    Route::delete('delete-post/{id}', [BlogController::class, 'destroy'])->name('delete-post');
});
