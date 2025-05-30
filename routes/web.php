<?php

use App\Http\Controllers\Api\PostController as ApiPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Inertia Routes
Route::get('inertiaPosts', [PostController::class, 'inertiaIndex']);

Route::get('inertiaPosts/{post}', [PostController::class, 'inertiaShow'])->name('inertia.posts.show');

Route::get('inertiaComments', [CommentController::class, 'inertiaIndex']);

// Auth Routes
Route::resource('posts', PostController::class)->middleware('auth')->except('index', 'show');

Route::resource('categories', CategoryController::class)->middleware('auth')->except('index', 'show');

Route::resource('comments', CommentController::class)->middleware('auth');

Route::get('/user-posts', [PostController::class, 'userPosts'])->middleware('auth')->name('user-posts');
Route::get('/user-comments', [CommentController::class, 'userComments'])->middleware('auth')->name('user-comments');

// Public Routes
Route::resource('posts', PostController::class)->only('index', 'show');

Route::resource('categories', CategoryController::class)->only('index', 'show');

Route::resource('comments', CommentController::class)->only('create', 'store', 'index');



require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
