<?php

use App\Http\Controllers\Auth\LoginContoller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginContoller::class,'login']);
Route::get('/home',[\App\Http\Controllers\HomeController::class,'home']);

Route::post('/login',[LoginContoller::class,'approve']);
Route::get('/register',[RegisterController::class,'register']);
Route::post('/register',[RegisterController::class,'register']);
Route::post('/logout',[\App\Http\Controllers\LogoutController::class,'logout']);
Route::get('/logout',[\App\Http\Controllers\LogoutController::class,'logout']);
