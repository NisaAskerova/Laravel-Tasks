<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('user.delete');