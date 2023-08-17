<?php

use App\Http\Controllers\Auth\LoginContoller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;





Route::resource('category',\App\Http\Controllers\CategoryController::class);
Route::resource('brand',\App\Http\Controllers\BrandController::class);
Route::resource('product',\App\Http\Controllers\ProductController::class);
Route::resource('like',\App\Http\Controllers\LikeController::class);
Route::resource('comment',\App\Http\Controllers\CommentController::class);
Route::resource('blog',\App\Http\Controllers\BlogController::class);
Route::resource('user',\App\Http\Controllers\UserController::class);


