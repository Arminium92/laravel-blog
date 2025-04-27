<?php

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
Route::resource('posts', Post::class)->middleware('auth')->except('index', 'show');

Route::resource('categories', Category::class)->middleware('auth')->except('index', 'show');

Route::resource('comments', Comment::class)->middleware('auth')->except('index', 'show');


// Public Routes
Route::resource('posts', Post::class)->only('index', 'show');

Route::resource('categories', Category::class)->only('index', 'show');

Route::resource('comments', Comment::class)->only('index', 'show');



require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
