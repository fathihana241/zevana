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
use App\Http\Controllers\WishlistController;



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

// route for admin and iuser dashboard 
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

    // welcome page route 
Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.process');
     
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [OrderController::class, 'index'])
        ->name('cart');
});


// admin route
Route::get('/admin/dashboard', function () {
    $categories = Category::all(); // pass categories to Blade
    return view('admin.dashboard', compact('categories'));
})->name('admin.dashboard.api');


// orders view for admin
Route::get('/orders', [OrderController::class, 'adminOrders'])->name('admin.orders');

// Delete order
Route::delete('/orders/{order}', [OrderController::class, 'destroyOrder'])->name('admin.orders.destroy');

// user view for admin
Route::get('/users', function () {
    $users = User::orderBy('created_at', 'desc')->get();
    return view('users', compact('users'));
})->name('admin.users');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware('auth')->group(function () {

    Route::post('/wishlist/add', [WishlistController::class, 'store'])
        ->name('wishlist.store');

    Route::get('/wishlist', [WishlistController::class, 'index'])
        ->name('wishlist.index');

    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])
        ->name('wishlist.destroy');
});