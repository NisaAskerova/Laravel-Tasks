<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'users', 'as'=>'users.'], function(){
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit'); 
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete'); 
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update'); 
});

Route::group(['prefix'=>'roles', 'as'=>'roles.'], function(){
    Route::get('/create', [RoleController::class, 'create'])->name('create');
    Route::get('/index', [RoleController::class, 'index'])->name('index');
    Route::post('/store', [RoleController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit'); 
    Route::get('/view/{id}', [RoleController::class, 'view'])->name('view'); 
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('update'); 
});
