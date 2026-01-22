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
use App\Livewire\AdminDashboard;
use App\Livewire\UserDashboard;
use App\Livewire\RegisterUser;
use App\Http\Controllers\CheckoutController;
use App\Livewire\LoginUser;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminProductController;



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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard', function () {

    $user = auth()->user();

    if ($user->user_type === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');

})->name('dashboard');

Route::get('/', [HomeController::class, 'index']);
Route::get('/watches', [ProductController::class, 'watches'])
    ->name('watches.shop');


Route::middleware('guest')->group(function () {
    Route::get('/register', RegisterUser::class)->name('register');
    Route::get('/login', LoginUser::class)->name('login');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/admin', AdminDashboard::class)
        ->name('admin.dashboard');
        

    Route::get('/user', UserDashboard::class)
        ->name('user.dashboard');
});

Route::get('/eyewear', [ProductController::class, 'eyewear'])
    ->name('eyewear.shop');
Route::get('/jewelry', [ProductController::class, 'jewelry'])->name('jewelry.shop');

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');



Route::post('/wishlist/add', function () {
    return 'Wishlist working';
})->name('wishlist.add');


Route::get('/accessories', [ProductController::class, 'accessories'])
    ->name('accessories.shop');

Route::get('/fragrance', [ProductController::class, 'fragrance'])
    ->name('fragrance.shop');

Route::get('/skincare', [ProductController::class, 'skincare'])
    ->name('skincare.shop');

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.process');
     
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [OrderController::class, 'index'])
        ->name('cart');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Admin dashboard
    Route::get('/dashboard', [AdminProductController::class, 'dashboard'])->name('admin.dashboard');

    // Admin Product CRUD
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/{id}/update', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}/delete', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});