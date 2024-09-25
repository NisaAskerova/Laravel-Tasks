<?php
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-blog', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/all-blogs', [BlogController::class, 'store'])->name('blog.store');
Route::get('/all-blogs', [BlogController::class, 'index'])->name('blogs.blog');
Route::get('/delete-blog/{id}', [BlogController::class, 'delete'])->name('blogs.delete');
Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/update-blog/{id}', [BlogController::class, 'update'])->name('blogs.update');


