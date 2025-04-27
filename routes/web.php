<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Auth Routes
Route::resource('posts', PostController::class)->middleware('auth')->except('index', 'show');

Route::resource('categories', CategoryController::class)->middleware('auth')->except('index', 'show');

Route::resource('comments', CommentController::class)->middleware('auth')->except('index', 'show');


// Public Routes
Route::resource('posts', PostController::class)->only('index', 'show');

Route::resource('categories', CategoryController::class)->only('index', 'show');

Route::resource('comments', CommentController::class)->only('index', 'show');



require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
