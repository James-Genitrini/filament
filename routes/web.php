<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('post/{slug}', [PostController::class, 'show'])->name('post.show');
