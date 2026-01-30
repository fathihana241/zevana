<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>jewelry</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (REQUIRED for icons) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4R7x3iZK4A3bKkKXg=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
</head>
<body>
   @include('layouts.header')
<!-- Section 1: Background Collage -->
<div class="flex justify-center gap-10 p-10">
    <img src="{{ asset('images/download (2).jpeg') }}" 
         alt="Earring 1" 
         class="w-72 h-80 object-cover">

    <img src="{{ asset('images/download (3).jpeg') }}" 
         alt="Earring 2" 
         class="w-72 h-80 object-cover">

    <img src="{{ asset('images/download (4).jpeg') }}" 
         alt="Earring 3" 
         class="w-72 h-80 object-cover">
</div>

<!-- Section 2: Categories -->
<div class="flex justify-center gap-10 py-8 bg-gray-100 flex-wrap">
    <a href="{{ route('jewelry.shop', ['category' => 'earrings']) }}" 
       class="text-2xl font-bold text-gray-700 hover:text-black hover:underline px-4 py-2">Earrings</a>
    <a href="{{ route('jewelry.shop', ['category' => 'necklace']) }}" 
       class="text-2xl font-bold text-gray-700 hover:text-black hover:underline px-4 py-2">Necklace</a>
    <a href="{{ route('jewelry.shop', ['category' => 'bracelet']) }}" 
       class="text-2xl font-bold text-gray-700 hover:text-black hover:underline px-4 py-2">Bracelet</a>
    <a href="{{ route('jewelry.shop', ['category' => 'rings']) }}" 
       class="text-2xl font-bold text-gray-700 hover:text-black hover:underline px-4 py-2">Rings</a>
</div>

<!-- Section 3: Product Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto py-10">
    @forelse($products as $product)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden 
                    transform transition duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fadeIn">

            <!-- Image Section -->
            <div class="relative group">
                <img src="{{ asset($product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">

                <!-- Badge -->
                <div class="absolute top-3 left-3 bg-black text-white text-xs px-3 py-1 rounded-full animate-slideIn">
                    Best Seller
                </div>

                <!-- Logo -->
                <div class="absolute top-3 right-3 bg-white p-1 rounded-full shadow animate-bounce-slow">
                    <img src="{{ asset('images/ZE-removebg-preview-removebg-preview.png') }}" 
                         alt="logo" 
                         class="w-6 h-6">
                </div>
            </div>

            <!-- Content -->
            <div class="p-5 text-left">
                <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                <p class="text-gray-500 text-sm mt-1">
                    Step back into classic hoops style with a durable leather.
                </p>

                <!-- Price + Buy Now -->
                <div class="flex items-center justify-between mt-4">
                    <span class="text-lg font-semibold">Rs. {{ number_format($product->price, 2) }}</span>

                    <form method="GET" action="{{ route('checkout') }}">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit"
            class="px-4 py-2 bg-black text-white rounded-full text-sm hover:bg-gray-800 transition flex items-center gap-1 hover:scale-105 transform duration-300">
        Buy Now <i class="fa fa-arrow-right"></i>
    </button>
</form>
                </div>

                <!-- Wishlist -->
                <form method="POST" action="{{ route('wishlist.add') }}" class="mt-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="category" value="jewelry">
                    <button type="submit" class="transition-transform duration-300 hover:scale-125">
                        <i class="fa-regular fa-star text-gray-400 hover:text-yellow-400 text-xl transition-colors duration-300"></i>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-center col-span-3 text-gray-500">No products found in this category.</p>
    @endforelse
</div>

<!-- Animations -->
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes slideIn {
  from { opacity: 0; transform: translateX(-20px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes bounceSlow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-4px); }
}
.animate-fadeIn {
  animation: fadeIn 0.8s ease-in-out;
}
.animate-slideIn {
  animation: slideIn 0.7s ease-in-out;
}
.animate-bounce-slow {
  animation: bounceSlow 2s infinite;
}
</style>
@include('layouts.footer')
</body>
</html>
