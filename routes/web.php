<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route view
Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/test', function () {
    return view('test');
});

route::view('/greeting', 'test');


//Route paramater
Route::get('/user', [UserController::class, 'index']);

Route::view('/test2', 'test');

Route::get('/user/{id}', function (string $id) {
    return 'Kamu mencari user dengan ID: ' . $id;
});

route::get('/posts/{post}/comments/{comment}', function ($post, $comment) {
    return 'Kamu mengakses postingan id ' . $post . ' Kemudian membuka komen id' . $comment . " yang isinya: Wah keren banget!";
});

route::get('/posts/{post}/comments/{comment?}', function ($post, $comment = null) {
    return 'Kamu mengakses postingan id ' . $post . ' Kemudian membuka komen id' . $comment . " yang isinya: Wah keren banget!";
});

route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('blogs/store', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{id}/detail', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{id}/delete', [BlogController::class, 'delete'])->name('blogs.delete');
