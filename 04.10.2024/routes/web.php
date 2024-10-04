<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'blogs', 'as'=>'blogs.'], function(){
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/store', [BlogController::class, 'store'])->name('store');
    Route::get('/index', [BlogController::class, 'index'])->name('index');
});

Route::group(['prefix'=>'tags', 'as'=>'tags.'], function(){
    Route::get('/create', [TagController::class, 'create'])->name('create');
    Route::post('/store', [TagController::class, 'store'])->name('store');
    Route::get('/index', [TagController::class, 'index'])->name('index');
});

Route::group(['prefix'=>'categories', 'as'=>'categories.'], function(){
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/index', [CategoryController::class, 'index'])->name('index');
});