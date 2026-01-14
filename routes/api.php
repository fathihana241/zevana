<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/categories', [CategoryController::class, 'store']);

  
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('users', UserController::class);
});
