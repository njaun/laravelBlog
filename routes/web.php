<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index']);

Route::get('/posts/create',[PostController::class, 'create']);

Route::post('/posts', [PostController::class, 'store']);


Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/create', [CategoryController::class, 'create']);

Route::post('/categories', [CategoryController::class, 'store']);


Route::post('/comments', [CommentController::class, 'store']);




Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);

Route::put('/categories/{category}', [CategoryController::class, 'update']);

Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

Route::get('/comments/{comment}/edit', [CommentController::class, 'edit']);

Route::put('/comments/{comment}', [CommentController::class, 'update']);

Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);