<?php


use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/create", [BlogController::class, 'create'])->name('blog.create');
Route::post("/store", [BlogController::class, 'store'])->name('blog.store');
Route::get("/index", [BlogController::class, 'index'])->name('blog.index');
Route::get("/edit/{id}", [BlogController::class, 'edit'])->name('blog.edit');
Route::get("/delete/{id}", [BlogController::class, 'delete'])->name('blog.delete');
Route::get("/view/{id}", [BlogController::class, 'view'])->name('blog.view');
Route::post("/update/{id}", [BlogController::class, 'update'])->name('blog.update');
