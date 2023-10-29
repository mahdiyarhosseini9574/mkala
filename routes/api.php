<?php

use App\Http\Controllers\Api\AuthController\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\UserController;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::get('login',function (){
//    $user= \App\Models\User::find(3);
//    return $user->createToken("mkala")->plainTextToken;
//});
//Route::middleware('auth:sanctum')
//    ->get('/profile',function (){
//       return \request()->user();
//    }
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('user', UserController::class);
Route::apiResource('blog', BlogController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('report', ReportController::class);
Route::apiResource('brand', BrandController::class);
Route::apiResource('comment', CommentController::class);
Route::get('brand/restore/{restore}',[BrandController::class,'restore']);
Route::delete('brand/forcedelete/{forcedelete}',[BrandController::class,'forcedelete']);
Route::post('like/blog/{blog}',[BlogController::class,'addLike']);
Route::post('like/product/{product}',[ProductController::class,'addLike']);
Route::get('view/blog/{blog}',[BlogController::class,'addview']);
Route::get('view/product/{product}',[ProductController::class,'addview']);
Route::get('toggle/blog/{blog}',[BlogController::class,'toggle']);
Route::get('toggle/product/{product}',[ProductController::class,'toggle']);
Route::get('highPriceProduct/product/',[ProductController::class,'highPriceProduct']);
Route::get('mostView/product',[ProductController::class,'mostView']);
Route::get('mostCommented/product',[ProductController::class,'mostCommented']);
Route::get('mostView/blog',[BlogController::class,'mostView']);
Route::get('mostCommented/blog',[BlogController::class,'mostCommented']);




