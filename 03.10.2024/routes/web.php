<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard'); 
    Route::get('/users', [AdminController::class, 'users'])->name('users'); 
    Route::patch('/toggle-user-status/{id}', [AdminController::class, 'toggleUserStatus'])->name('toggleUserStatus');
    Route::get('/blogs', [AdminController::class, 'blogs'])->name('blogs'); 
    Route::patch('/toggle-blog-status/{id}', [AdminController::class, 'toggleBlogStatus'])->name('toggleBlogStatus'); 
    Route::get('/blogs/users-count', action: [AdminController::class, 'usersBlogsCount'])->name('blogs.users.count');
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/show-register', [AuthController::class, 'showRegister'])->name('show-register');
    Route::get('/show-login', [AuthController::class, 'showLogin'])->name('show-login');
    Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp'); 

    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.verify'); 
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});



Route::group(['prefix' => 'blogs', 'as' => 'blogs.', 'middleware' => 'auth'], function () {
    Route::get('/index', [BlogController::class, 'index'])->name('index');
    Route::get('/myblogs', [BlogController::class, 'myblogs'])->name('myblogs');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/store', [BlogController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit'); 
    Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('delete'); 
    Route::post('/update/{id}', [BlogController::class, 'update'])->name('update'); 

});
