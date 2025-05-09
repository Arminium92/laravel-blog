<?php


use Illuminate\Support\Facades\Route;

Route::get('posts', [\App\Http\Controllers\Api\PostController::class, 'index']);
Route::get('posts/{post}', [\App\Http\Controllers\Api\PostController::class, 'show']);
