<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'categories', 'as'=>'categories.'], function(){
Route::get('/index', [CategoryController::class , 'index'])->name('index');
Route::get('/edit/{id}', [CategoryController::class , 'edit'])->name('edit');
Route::get('/create', [CategoryController::class , 'create'])->name('create');
Route::post('/update/{id}', [CategoryController::class , 'update'])->name('update');
Route::post('/store', [CategoryController::class , 'store'])->name('store');
Route::get('/delete/{id}', [CategoryController::class , 'delete'])->name('delete');
});
Route::group(['prefix'=>'blogs', 'as'=>'blogs.'], function(){
Route::get('/index', [BlogController::class , 'index'])->name('index');
Route::get('/edit/{id}', [BlogController::class , 'edit'])->name('edit');
Route::get('/create', [BlogController::class , 'create'])->name('create');
Route::post('/update/{id}', [BlogController::class , 'update'])->name('update');
Route::post('/store', [BlogController::class , 'store'])->name('store');
Route::get('/delete/{id}', [BlogController::class , 'delete'])->name('delete');
});

// Route::get('/category/index', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
// Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');  