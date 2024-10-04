<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::middleware('auth')->group(function(){
//     Route::get('create', [UserController::class, 'create'])->name("user.create");
// });
Route::get('/index', [UserController::class, 'index'])->name("user.index");
Route::post('/update', [UserController::class, 'update'])->name("user.update");

Route::get('/login', [AuthController::class, 'showLogin'])->name('show-login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show-register');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp');

Route::middleware('auth')->group(function(){
    Route::get('/me', [UserController::class, 'me'])->name('me');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});