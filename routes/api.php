<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ProductApiController;




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


// ---------------------------
Route::middleware('auth:sanctum')->group(function () {

    // PRODUCT CRUD
    Route::get('/products', [ProductApiController::class, 'index']);       // List all products
    Route::get('/products/{id}', [ProductApiController::class, 'show']);   // Show single product
    Route::post('/products', [ProductApiController::class, 'store']);      // Add new product
    Route::post('/products/{id}', [ProductApiController::class, 'update']); // Update product
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy']); // Delete product

Route::get('/categories/{id}/children', function ($id) {
    return \App\Models\Category::where('parent_id', $id)->get();
});

});