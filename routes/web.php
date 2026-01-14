<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\ProductController;
use App\Livewire\AdminLogin;
use App\Livewire\UserLogin;
use App\Livewire\AdminDashboard;
use App\Livewire\UserDashboard;

Route::get('test', function () {

    // 1️⃣ Category → Products (Jewelry, Watches, etc.)
    $category = Category::find(1);
    return $category->products;

    // 2️⃣ Review → User / Product
    $review = Review::find(1);
    // return $review->user;
    // return $review->product;

    // 3️⃣ Product → Category / Reviews / Tags
    $product = Product::find(1);
    // return $product->category;
    // return $product->reviews;
    // return $product->tags;

    // 4️⃣ Tag → Products
    $tag = Tag::find(1);
    // return $tag->products;

    // 5️⃣ User → Products / Reviews
    $user = User::find(1);
    // return $user->products;
    // return $user->reviews;

});

Route::get('/', [HomeController::class, 'index']);
Route::get('/watches', [ProductController::class, 'watches'])
    ->name('watches.shop');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/admin/login', AdminLogin::class)->name('admin.login');
Route::get('/user/login', UserLogin::class)->name('user.login');
Route::get('/admin/dashboard', AdminDashboard::class)
    ->middleware('admin')
    ->name('admin.dashboard');

Route::get('/user/dashboard', UserDashboard::class)
    ->middleware('user')
    ->name('user.dashboard');